<?php require_once '../templates/header.php'; ?>
<link rel="stylesheet" href="../css/login.css">
<div class="login-wrapper">
    <div class="login-container">
        <div class="logo">
            <img src="https://elitexpress.co/wp-content/uploads/2024/09/LOGO.png" alt="EliteXpress Logo">
        </div>
        <h1>Iniciar Sesión</h1>
        <form action="../handlers/login_handler.php" method="POST">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="login-btn" id="loginBtn">Entrar</button>
            <div class="signup-wrapper">
                <a href="./signup_allie.php" class="p"><p>¿Quieres ser aliado?</p></a>
            </div>
            <p class="error-message" id="errorMessage"
                style="<?= isset($_GET['error']) ? 'display: block;' : 'display: none;' ?>">
                <?= isset($_GET['error']) ? htmlspecialchars($_GET['error']) : 'Usuario o contraseña incorrectos' ?>
            </p>
        </form>
    </div>
</div>

<?php require_once '../templates/footer.php'; ?>