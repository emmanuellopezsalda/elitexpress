<?php
function getPDO() {
    $host = 'localhost';
    $dbname = 'elitexpress';
    $user = 'root';
    $pass = '';

    try {
        return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
