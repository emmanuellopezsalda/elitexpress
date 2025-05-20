<?php require_once '../templates/header.php'; ?>
<link rel="stylesheet" href="../css/login.css">
<div class="login-wrapper">
    <div class="login-container">
        <div class="logo">
            <img src="https://elitexpress.co/wp-content/uploads/2024/09/LOGO.png" alt="EliteXpress Logo">
        </div>
        <h1>Registrarse como Aliado</h1>
        <form action="../handlers/signup_handler.php" method="POST">
            <div class="form-group">
                <label for="modalUsername">Nombre</label>
                <input type="text" id="modalEditName" name="name" required>
            </div>
            <div class="form-group">
                <label for="modalUsername">Correo</label>
                <input type="email" id="modalEditEmail" name="email" required>
            </div>
            <div class="form-group">
                <label for="modalPassword">Contraseña</label>
                <input type="password" id="modalEditPassword" name="password" required>
            </div>
            <div class="form-group">
                <label for="modalPassword">Direccion</label>
                <input type="text" id="modalEditAddress" name="address" required>
            </div>
            <div class="form-group">
                <label for="modalPassword">NIT</label>
                <input type="number" id="modalEditNit" name="nit" required>
            </div>
            <div class="form-group">
                <label for="modalPassword">Contacto</label>
                <input type="number" id="modalEditContact" name="contact" required>
            </div>
            <button type="submit" class="login-btn" id="loginBtn">Entrar</button>
            <p class="error-message" id="errorMessage"
                style="<?= isset($_GET['error']) ? 'display: block;' : 'display: none;' ?>">
                <?= isset($_GET['error']) ? htmlspecialchars($_GET['error']) : 'Usuario o contraseña incorrectos' ?>
            </p>
        </form>
    </div>
</div>

<?php require_once '../templates/footer.php'; ?>