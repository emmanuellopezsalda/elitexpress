<?php
require_once '../config/database.php';
require_once '../includes/session.php';

$pdo = getPDO();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute(['username' => $username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['usuario_id'] = $user['id'];
    $_SESSION['usuario'] = $user['username'];
    $_SESSION['rol'] = $user['role'];

        header('Location: ../public/dashboard.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM allies WHERE name = :username");
$stmt->execute(['username' => $username]);
$allie = $stmt->fetch();

if ($allie && password_verify($password, $allie['password'])) {
    $_SESSION['usuario_id'] = $allie['id'];
    $_SESSION['aliado'] = $allie['name'];

    header('Location: ../public/allie_dashboard.php');
    exit;
}

header('Location: ../public/index.php?error=Credenciales+incorrectas');
exit;
?>
