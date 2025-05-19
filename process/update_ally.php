<?php
require_once '../includes/session.php';
requireLogin();

require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $address = $_POST['address'] ?? '';
    $nit = $_POST['nit'] ?? '';
    $contact = $_POST['contact'] ?? '';
    
    if (empty($id) || empty($name) || empty($email) || empty($address) || empty($nit) || empty($contact)) {
        $_SESSION['error'] = "Todos los campos son obligatorios excepto la contraseña";
        header('Location: ../public/dashboard.php');
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Formato de correo electrónico inválido";
        header('Location: ../public/dashboard.php');
        exit;
    }
    
    try {
        $pdo = getPDO();        
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM allies WHERE email = :email AND id != :id");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->fetchColumn() > 0) {
            $_SESSION['error'] = "El correo electrónico ya está registrado por otro aliado";
            header('Location: ../public/dashboard.php');
            exit;
        }
        
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $pdo->prepare("
                UPDATE allies 
                SET name = :name, 
                    email = :email, 
                    password = :password, 
                    address = :address, 
                    nit = :nit, 
                    contact = :contact 
                WHERE id = :id
            ");
            
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        } else {
            $stmt = $pdo->prepare("
                UPDATE allies 
                SET name = :name, 
                    email = :email, 
                    address = :address, 
                    nit = :nit, 
                    contact = :contact 
                WHERE id = :id
            ");
        }
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':nit', $nit, PDO::PARAM_STR);
        $stmt->bindParam(':contact', $contact, PDO::PARAM_STR);
        
        $stmt->execute();
        
        $_SESSION['success'] = "Aliado actualizado exitosamente";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error al actualizar el aliado: " . $e->getMessage();
    }
    
    header('Location: ../public/dashboard.php');
    exit;
} else {
    header('Location: ../public/dashboard.php');
    exit;
}
?>