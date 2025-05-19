<?php

require_once '../config/database.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$admin_username = 'admin';
$new_password = '1'; 

try {
    $pdo = getPDO();
    
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE username = :username");
    $result = $stmt->execute([
        'password' => $hashed_password,
        'username' => $admin_username
    ]);
    
    if ($result) {
        echo "<h1>Contraseña actualizada correctamente</h1>";
        echo "<p>La contraseña del usuario <strong>{$admin_username}</strong> ha sido actualizada.</p>";
        echo "<p>Nueva contraseña: <strong>{$new_password}</strong></p>";
        echo "<p>Hash generado: <code>{$hashed_password}</code></p>";
        echo "<p><strong>IMPORTANTE:</strong> Elimina este archivo inmediatamente después de usarlo.</p>";
        echo "<p><a href='../public/index.php'>Ir a la página de inicio de sesión</a></p>";
    } else {
        echo "<h1>Error al actualizar la contraseña</h1>";
        echo "<p>No se pudo actualizar la contraseña. Verifica que el usuario exista.</p>";
    }
} catch (PDOException $e) {
    echo "<h1>Error de base de datos</h1>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
?>