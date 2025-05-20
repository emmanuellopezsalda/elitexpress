<?php
require_once '../config/database.php';
session_start();

function sanitize($data) {
    return trim($data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seller_id = (int)$_POST['seller_id'];
    $origin = sanitize($_POST['origin']);
    $destination = sanitize($_POST['destination']);
    $height = (float)$_POST['height'];
    $width = (float)$_POST['width'];
    $weight = (float)$_POST['weight'];
    $recipient_name = sanitize($_POST['recipient_name']);
    $recipient_address = sanitize($_POST['recipient_address']);
    $recipient_phone = sanitize($_POST['recipient_phone']);
    $commercial_value = (float)$_POST['commercial_value'];
    $total = (float)$_POST['total'];
    $status = "pendiente";
    
    $errors = [];
    
    if (empty($seller_id)) {
        $errors[] = "El ID del vendedor es obligatorio";
    }
    if (empty($origin)) {
        $errors[] = "El origen es obligatorio";
    }
    if (empty($destination)) {
        $errors[] = "El destino es obligatorio";
    }
    if ($height <= 0) {
        $errors[] = "La altura debe ser mayor que cero";
    }
    if ($width <= 0) {
        $errors[] = "El ancho debe ser mayor que cero";
    }
    if ($weight <= 0) {
        $errors[] = "El peso debe ser mayor que cero";
    }
    if (empty($recipient_name)) {
        $errors[] = "El nombre del destinatario es obligatorio";
    }
    if (empty($recipient_address)) {
        $errors[] = "La dirección del destinatario es obligatoria";
    }
    if (empty($recipient_phone)) {
        $errors[] = "El teléfono del destinatario es obligatorio";
    }
    if ($commercial_value < 0) {
        $errors[] = "El valor comercial no puede ser negativo";
    }
    if ($total <= 0) {
        $errors[] = "El total debe ser mayor que cero";
    }
    
    if (empty($errors)) {
        try {
            $pdo = getPDO();
            
            $sql = "INSERT INTO orders (
                    seller_id, origin, destination, height, width, weight,
                    recipient_name, recipient_address, recipient_phone, commercial_value, total, status
                ) VALUES (
                    :seller_id, :origin, :destination, :height, :width, :weight,
                    :recipient_name, :recipient_address, :recipient_phone, :commercial_value, :total, :status
                )";
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':seller_id', $seller_id, PDO::PARAM_INT);
            $stmt->bindParam(':origin', $origin, PDO::PARAM_STR);
            $stmt->bindParam(':destination', $destination, PDO::PARAM_STR);
            $stmt->bindParam(':height', $height, PDO::PARAM_STR);
            $stmt->bindParam(':width', $width, PDO::PARAM_STR);
            $stmt->bindParam(':weight', $weight, PDO::PARAM_STR);
            $stmt->bindParam(':recipient_name', $recipient_name, PDO::PARAM_STR);
            $stmt->bindParam(':recipient_address', $recipient_address, PDO::PARAM_STR);
            $stmt->bindParam(':recipient_phone', $recipient_phone, PDO::PARAM_STR);
            $stmt->bindParam(':commercial_value', $commercial_value, PDO::PARAM_STR);
            $stmt->bindParam(':total', $total, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Orden creada exitosamente con ID: " . $pdo->lastInsertId();
            } else {
                $_SESSION['error_message'] = "Error al crear la orden: Hubo un problema al ejecutar la consulta.";
            }
        } catch (PDOException $e) {
            $_SESSION['error_message'] = "Error al crear la orden: " . $e->getMessage();
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