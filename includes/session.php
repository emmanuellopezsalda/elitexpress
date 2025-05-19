<?php
session_start();

function isAuthenticated() {
    return isset($_SESSION['usuario_id']);
}

function requireLogin() {
    if (!isAuthenticated()) {
        header('Location: index.php');
        exit();
    }
}

function logOut(): void{
    $_SESSION = [];
    session_destroy();
    header('Location: ../public/index.php');
}