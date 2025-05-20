<?php
// Iniciar sesión si aún no está iniciada
session_start();

// Incluir archivo de conexión a la base de datos
require_once '../config/database.php';

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar y sanitizar los datos del formulario
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = trim($_POST['password']); // No sanitizamos la contraseña, ya que se hasheará
    $address = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS));
    $nit = trim(filter_input(INPUT_POST, 'nit', FILTER_SANITIZE_NUMBER_INT));
    $contact = trim(filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_NUMBER_INT));

    // Validación de campos
    $errors = [];
    
    // Validar que los campos no estén vacíos
    if (empty($name)) {
        $errors[] = "El nombre es obligatorio";
    }
    
    if (empty($email)) {
        $errors[] = "El correo electrónico es obligatorio";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El formato del correo electrónico no es válido";
    }
    
    if (empty($password)) {
        $errors[] = "La contraseña es obligatoria";
    } elseif (strlen($password) < 6) {
        $errors[] = "La contraseña debe tener al menos 6 caracteres";
    }
    
    if (empty($address)) {
        $errors[] = "La dirección es obligatoria";
    }
    
    if (empty($nit)) {
        $errors[] = "El NIT es obligatorio";
    }
    
    if (empty($contact)) {
        $errors[] = "El contacto es obligatorio";
    }

    // Si no hay errores, continuamos con el registro
    if (empty($errors)) {
        try {
            // Crear conexión a la base de datos usando PDO
            $conn = getPDO();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Verificar si el correo ya existe en la base de datos
            $checkEmail = $conn->prepare("SELECT COUNT(*) FROM allies WHERE email = :email");
            $checkEmail->bindParam(':email', $email);
            $checkEmail->execute();
            
            if ($checkEmail->fetchColumn() > 0) {
                header("Location: ../public/signup_allie?error=Este correo electrónico ya está registrado");
                exit();
            }
            
            // Hashear la contraseña
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            // Preparar la consulta SQL para insertar el nuevo aliado
            $stmt = $conn->prepare("INSERT INTO allies (name, email, password, address, nit, contact) 
                                    VALUES (:name, :email, :password, :address, :nit, :contact)");
            
            // Vincular parámetros
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':nit', $nit);
            $stmt->bindParam(':contact', $contact);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Registro exitoso, redirigir al login con mensaje de éxito
                header("Location: ../public/index.php?success=Registro exitoso. Por favor inicia sesión");
                exit();
            } else {
                // Error al registrar
                header("Location: ../public/signup_allie?error=Error al registrar, por favor intenta de nuevo");
                exit();
            }
            
        } catch (PDOException $e) {
            // Error de conexión a la base de datos
            header("Location: ../public/signup_allie?error=Error del servidor: " . urlencode($e->getMessage()));
            exit();
        }
    } else {
        // Si hay errores, redirigir al formulario de registro con el primer error
        header("Location: ../public/signup_allie?error=" . urlencode($errors[0]));
        exit();
    }
} else {
    // Si no es una solicitud POST, redirigir a la página de registro
    header("Location: ../public/signup_allie");
    exit();
}
?>