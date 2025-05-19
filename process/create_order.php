<?php
require_once '../config/database.php';
function sanitize($data) {
    return trim($data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seller_id = (int)$_POST['seller_id'];
    $origin = sanitize($_POST['origin']);
    $destination = sanitize($_POST['destination']);
    $height = (int)$_POST['height'];
    $width = (int)$_POST['width'];
    $weight = (float)$_POST['weight'];
    $recipient_name = sanitize($_POST['recipient_name']);
    $recipient_address = sanitize($_POST['recipient_address']);
    $recipient_phone = sanitize($_POST['recipient_phone']);
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
    if (empty($height)) {
        $errors[] = "La altura es obligatoria";
    }
    if (empty($width)) {
        $errors[] = "El ancho es obligatorio";
    }
    if (empty($weight)) {
        $errors[] = "El peso es obligatorio";
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
    if (empty($total)) {
        $errors[] = "El total es obligatorio";
    }
    
    if (empty($errors)) {
        try {
            $pdo = getPDO();
            
            $sql = "INSERT INTO orders (
                    seller_id, origin, destination, height, width, weight,
                    recipient_name, recipient_address, recipient_phone, total, status
                ) VALUES (
                    :seller_id, :origin, :destination, :height, :width, :weight,
                    :recipient_name, :recipient_address, :recipient_phone, :total, :status
                )";
            
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':seller_id', $seller_id, PDO::PARAM_INT);
            $stmt->bindParam(':origin', $origin, PDO::PARAM_STR);
            $stmt->bindParam(':destination', $destination, PDO::PARAM_STR);
            $stmt->bindParam(':height', $height, PDO::PARAM_INT);
            $stmt->bindParam(':width', $width, PDO::PARAM_INT);
            $stmt->bindParam(':weight', $weight, PDO::PARAM_STR);
            $stmt->bindParam(':recipient_name', $recipient_name, PDO::PARAM_STR);
            $stmt->bindParam(':recipient_address', $recipient_address, PDO::PARAM_STR);
            $stmt->bindParam(':recipient_phone', $recipient_phone, PDO::PARAM_STR);
            $stmt->bindParam(':total', $total, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            
            if ($stmt->execute()) {
                $mensaje = "Orden creada exitosamente con ID: " . $pdo->lastInsertId();
                $tipo_mensaje = "success";
            }
        } catch (PDOException $e) {
            $mensaje = "Error al crear la orden: " . $e->getMessage();
            $tipo_mensaje = "error";
        }
        header('Location: ../public/allie_dashboard.php');
        exit;
    }
}

