<?php
require_once '../config/database.php';
session_start();

function sanitize($data)
{
    return trim($data);
}

function findOrCreateClient($pdo, $clientData)
{
    // Primero intentamos encontrar el cliente existente
    $searchSql = "";
    $searchParams = [];

    // Buscar por documento si se proporciona
    if (!empty($clientData['document'])) {
        $searchSql = "SELECT id FROM clients WHERE document = :document";
        $searchParams[':document'] = $clientData['document'];
    }
    // Si no hay documento, buscar por email
    elseif (!empty($clientData['email'])) {
        $searchSql = "SELECT id FROM clients WHERE email = :email";
        $searchParams[':email'] = $clientData['email'];
    }
    // Si no hay documento ni email, buscar por teléfono
    elseif (!empty($clientData['phone_number'])) {
        $searchSql = "SELECT id FROM clients WHERE phone_number = :phone_number";
        $searchParams[':phone_number'] = $clientData['phone_number'];
    }

    // Si tenemos criterios de búsqueda, buscamos el cliente
    if (!empty($searchSql)) {
        $searchStmt = $pdo->prepare($searchSql);
        $searchStmt->execute($searchParams);
        $existingClient = $searchStmt->fetch(PDO::FETCH_ASSOC);

        if ($existingClient) {
            return $existingClient['id'];
        }
    }

    // Si no encontramos el cliente, lo creamos
    $insertSql = "INSERT INTO clients (name, document, company, nit, phone_number, email) 
                  VALUES (:name, :document, :company, :nit, :phone_number, :email)";

    $insertStmt = $pdo->prepare($insertSql);

    $insertStmt->bindParam(':name', $clientData['name'], PDO::PARAM_STR);
    $insertStmt->bindParam(':document', $clientData['document'], PDO::PARAM_INT);
    $insertStmt->bindParam(':company', $clientData['company'], PDO::PARAM_STR);
    $insertStmt->bindParam(':nit', $clientData['nit'], PDO::PARAM_INT);
    $insertStmt->bindParam(':phone_number', $clientData['phone_number'], PDO::PARAM_STR);
    $insertStmt->bindParam(':email', $clientData['email'], PDO::PARAM_STR);

    if ($insertStmt->execute()) {
        return $pdo->lastInsertId();
    } else {
        throw new Exception("Error al crear el cliente");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seller_id = (int) $_POST['seller_id'];
    $origin = sanitize($_POST['origin']);
    $destination = sanitize($_POST['destination']);
    $height = (int) $_POST['height'];
    $width = (int) $_POST['width'];
    $weight = (float) $_POST['weight'];
    $receiver_name = sanitize($_POST['receiver_name']);
    $receiver_address = sanitize($_POST['receiver_address']);
    $receiver_phone = sanitize($_POST['receiver_phone']);
    $commercial_value = (int) $_POST['commercial_value'];
    $description = sanitize($_POST['description'] ?? '');
    $total = (int) $_POST['total'];
    $status = "pendiente";

    // Datos del cliente
    $client_name = sanitize($_POST['client_name'] ?? '');
    $client_document = !empty($_POST['client_document']) ? (int) $_POST['client_document'] : null;
    $client_company = sanitize($_POST['client_company'] ?? '');
    $client_nit = !empty($_POST['client_nit']) ? (int) $_POST['client_nit'] : null;
    $client_phone = sanitize($_POST['client_phone'] ?? '');
    $client_email = sanitize($_POST['client_email'] ?? '');

    $errors = [];

    // Validaciones existentes
    if (empty($seller_id)) {
        $errors[] = "El ID del vendedor es obligatorio";
    }
    if (empty($origin)) {
        $errors[] = "El origen es obligatorio";
    }
    // if (empty($destination)) {
    //     $errors[] = "El destino es obligatorio";
    // }
    if ($height <= 0) {
        $errors[] = "La altura debe ser mayor que cero";
    }
    if ($width <= 0) {
        $errors[] = "El ancho debe ser mayor que cero";
    }
    if ($weight <= 0) {
        $errors[] = "El peso debe ser mayor que cero";
    }
    if (empty($receiver_name)) {
        $errors[] = "El nombre del destinatario es obligatorio";
    }
    if (empty($receiver_address)) {
        $errors[] = "La dirección del destinatario es obligatoria";
    }
    if (empty($receiver_phone)) {
        $errors[] = "El teléfono del destinatario es obligatorio";
    }
    if ($commercial_value < 0) {
        $errors[] = "El valor comercial no puede ser negativo";
    }
    if ($total <= 0) {
        $errors[] = "El total debe ser mayor que cero";
    }

    // Validaciones del cliente
    if (empty($client_phone)) {
        $errors[] = "El teléfono del cliente es obligatorio";
    }

    // Validar que al menos tenga nombre o empresa
    if (empty($client_name) && empty($client_company)) {
        $errors[] = "Debe proporcionar al menos el nombre del cliente o la empresa";
    }

    if (empty($errors)) {
        try {
            $pdo = getPDO();

            // Comenzar transacción
            $pdo->beginTransaction();

            // Preparar datos del cliente
            $clientData = [
                'name' => $client_name,
                'document' => $client_document,
                'company' => $client_company,
                'nit' => $client_nit,
                'phone_number' => $client_phone,
                'email' => $client_email
            ];

            // Encontrar o crear cliente
            $client_id = findOrCreateClient($pdo, $clientData);

            // Insertar la orden con el client_id
            $sql = "INSERT INTO orders (
                    seller_id, client_id, origin, destination, height, width, weight,
                    receiver_name, receiver_address, receiver_phone, commercial_value, description, total, status, created_at
                ) VALUES (
                    :seller_id, :client_id, :origin, :destination, :height, :width, :weight,
                    :receiver_name, :receiver_address, :receiver_phone, :commercial_value, :description, :total, :status, NOW()
                )";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':seller_id', $seller_id, PDO::PARAM_INT);
            $stmt->bindParam(':client_id', $client_id, PDO::PARAM_INT);
            $stmt->bindParam(':origin', $origin, PDO::PARAM_STR);
            $stmt->bindParam(':destination', $destination, PDO::PARAM_STR);
            $stmt->bindParam(':height', $height, PDO::PARAM_INT);
            $stmt->bindParam(':width', $width, PDO::PARAM_INT);
            $stmt->bindParam(':weight', $weight, PDO::PARAM_STR);
            $stmt->bindParam(':receiver_name', $receiver_name, PDO::PARAM_STR);
            $stmt->bindParam(':receiver_address', $receiver_address, PDO::PARAM_STR);
            $stmt->bindParam(':receiver_phone', $receiver_phone, PDO::PARAM_STR);
            $stmt->bindParam(':commercial_value', $commercial_value, PDO::PARAM_INT);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':total', $total, PDO::PARAM_INT);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);

            if ($stmt->execute()) {
                // Confirmar transacción
                $pdo->commit();
                $_SESSION['success_message'] = "Orden creada exitosamente con ID: " . $pdo->lastInsertId() . " y Cliente ID: " . $client_id;
            } else {
                // Revertir transacción
                $pdo->rollBack();
                $_SESSION['error_message'] = "Error al crear la orden: Hubo un problema al ejecutar la consulta.";
            }
        } catch (PDOException $e) {
            // Revertir transacción en caso de error
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            $_SESSION['error_message'] = "Error en la base de datos: " . $e->getMessage();
        } catch (Exception $e) {
            // Revertir transacción en caso de error
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            $_SESSION['error_message'] = "Error al procesar la orden: " . $e->getMessage();
        }
    } else {
        // Si hay errores, los guardamos en la sesión
        $_SESSION['error_message'] = "No se pudo crear la orden debido a los siguientes errores:<br>" . implode("<br>", $errors);
        // También guardamos los datos del formulario para rellenar el formulario cuando se redirija
        $_SESSION['form_data'] = $_POST;
    }

    // Redireccionar de vuelta al panel de control
    header('Location: ../public/allie_dashboard.php');
    exit;
}
?>