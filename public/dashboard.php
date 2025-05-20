<?php
require_once '../includes/session.php';
requireLogin();

require_once '../config/database.php';

$pdo = getPDO();

$stmt = $pdo->prepare("SELECT * FROM orders ORDER BY created_at DESC");
$stmt->execute();
$orders = $stmt->fetchAll();
?>

<?php require_once '../templates/header.php'; ?>

<link rel="stylesheet" href="../css/admin.css">
<div class="admin-layout">
    <aside class="sidebar">
        <h2><?= $_SESSION["usuario"] ?></h2>
        <nav>
            <ul class="menu-list">
                <li><button id="menuEnvios" class="menu-btn">Envíos</button></li>
                <li><button id="menuUsuarios" class="menu-btn">Usuarios</button></li>
                <li><button id="menuVendedores" class="menu-btn">Vendedores</button></li>
                <form action="../handlers/logout.php" method="POST" style="display:inline;">
                    <button type="submit">Cerrar sesión</button>
                </form>
            </ul>
        </nav>
    </aside>

    <main class="main-content">
        <section id="enviosSection">
            <h1>Gestión de Envíos</h1>
            <div class="filter-bar">
                <label for="filterOrigen">Filtrar por Origen:</label>
                <select id="filterOrigen">
                    <option value="">Todos</option>
                    <option value="Bogotá">Bogotá</option>
                    <option value="Medellín">Medellín</option>
                    <option value="Bello">Bello</option>
                    <option value="Caldas">Caldas</option>
                    <option value="Copacabana">Copacabana</option>
                    <option value="Envigado">Envigado</option>
                    <option value="Girardota">Girardota</option>
                    <option value="Itagüí">Itagüí</option>
                    <option value="La Estrella">La Estrella</option>
                    <option value="Sabaneta">Sabaneta</option>
                    <option value="Alta Vista">Alta Vista</option>
                    <option value="San Antonio de Prado">San Antonio de Prado</option>
                    <option value="Santa Elena">Santa Elena</option>
                    <option value="Palmitas">Palmitas</option>
                    <option value="San Cristóbal">San Cristóbal</option>
                    <option value="Chocó-Acandí">Chocó-Acandí</option>
                    <option value="Chocó-Certeguí">Chocó-Certeguí</option>
                    <option value="Chocó-Condoto">Chocó-Condoto</option>
                    <option value="Chocó- El dos">Chocó- El dos</option>
                    <option value="Chocó-La Y">Chocó-La Y</option>
                    <option value="Chocó- Las Animas">Chocó- Las Animas</option>
                    <option value="Chocó- Nóvita">Chocó- Nóvita</option>
                    <option value="Chocó-Quibdó">Chocó-Quibdó</option>
                    <option value="Chocó-Tadó">Chocó-Tadó</option>
                    <option value="Chocó-Tutumendo">Chocó-Tutumendo</option>
                    <option value="Chocó-Yutó">Chocó-Yutó</option>
                    <option value="Apartadó">Apartadó</option>
                    <option value="Cañasgordas">Cañasgordas</option>
                    <option value="Capurganá">Capurganá</option>
                    <option value="Carepa">Carepa</option>
                    <option value="Chigorodó">Chigorodó</option>
                    <option value="Currulao">Currulao</option>
                    <option value="Mutatá">Mutatá</option>
                    <option value="Necoclí">Necoclí</option>
                    <option value="Riosucio">Riosucio</option>
                    <option value="Turbo">Turbo</option>
                    <option value="Uramita">Uramita</option>
                </select>

                <label for="filterDestino">Filtrar por Destino:</label>
                <select id="filterDestino">
                    <option value="">Todos</option>
                    <option value="Bogotá">Bogotá</option>
                    <option value="Medellín">Medellín</option>
                    <option value="Bello">Bello</option>
                    <option value="Caldas">Caldas</option>
                    <option value="Copacabana">Copacabana</option>
                    <option value="Envigado">Envigado</option>
                    <option value="Girardota">Girardota</option>
                    <option value="Itagüí">Itagüí</option>
                    <option value="La Estrella">La Estrella</option>
                    <option value="Sabaneta">Sabaneta</option>
                    <option value="Alta Vista">Alta Vista</option>
                    <option value="San Antonio de Prado">San Antonio de Prado</option>
                    <option value="Santa Elena">Santa Elena</option>
                    <option value="Palmitas">Palmitas</option>
                    <option value="San Cristóbal">San Cristóbal</option>
                    <option value="Chocó-Acandí">Chocó-Acandí</option>
                    <option value="Chocó-Certeguí">Chocó-Certeguí</option>
                    <option value="Chocó-Condoto">Chocó-Condoto</option>
                    <option value="Chocó- El dos">Chocó- El dos</option>
                    <option value="Chocó-La Y">Chocó-La Y</option>
                    <option value="Chocó- Las Animas">Chocó- Las Animas</option>
                    <option value="Chocó- Nóvita">Chocó- Nóvita</option>
                    <option value="Chocó-Quibdó">Chocó-Quibdó</option>
                    <option value="Chocó-Tadó">Chocó-Tadó</option>
                    <option value="Chocó-Tutumendo">Chocó-Tutumendo</option>
                    <option value="Chocó-Yutó">Chocó-Yutó</option>
                    <option value="Apartadó">Apartadó</option>
                    <option value="Cañasgordas">Cañasgordas</option>
                    <option value="Capurganá">Capurganá</option>
                    <option value="Carepa">Carepa</option>
                    <option value="Chigorodó">Chigorodó</option>
                    <option value="Currulao">Currulao</option>
                    <option value="Mutatá">Mutatá</option>
                    <option value="Necoclí">Necoclí</option>
                    <option value="Riosucio">Riosucio</option>
                    <option value="Turbo">Turbo</option>
                    <option value="Uramita">Uramita</option>
                </select>

                <button id="filterBtn">Aplicar Filtros</button>
            </div>
            <div class="table-container">
                <?php if (empty($orders)): ?>
                    <p>No tienes órdenes registradas aún.</p>
                <?php else: ?>
                    <table id="enviosTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Vendedor</th>
                                <th>Fecha</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Peso (kg)</th>
                                <th>Ancho (cm)</th>
                                <th>Altura(cm)</th>
                                <th>Valor Comercial</th>
                                <th>Total</th>
                                <!-- <th>Acciones</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td><?= $order['id'] ?></td>
                                    <td><?= $order['seller_id'] ?></td>
                                    <td><?= $order['created_at'] ?></td>
                                    <td><?= htmlspecialchars($order['origin'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($order['destination'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($order['weight'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($order['width'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($order['height'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($order['commercial_value'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($order['total'] ?? 'N/A') ?></td>
                                    <!-- <td>
                                        <button class="btn-view" data-id="<?= $order['id'] ?>">Ver</button>
                                        <button class="btn-edit" data-id="<?= $order['id'] ?>">Editar</button>
                                    </td> -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </section>
        <section id="usuariosSection" style="display: none;">
            <h1>Lista de Usuarios</h1>
            <div class="table-container">
                <?php
                $stmtUsuarios = $pdo->query("SELECT * FROM users");
                $usuarios = $stmtUsuarios->fetchAll();
                ?>

                <?php if (empty($usuarios)): ?>
                    <p>No hay vendedores registrados aún.</p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <td><?= $usuario['id'] ?></td>
                                    <td><?= htmlspecialchars($usuario['username']) ?></td>
                                    <td><?= $usuario['role'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </section>
        <div id="userModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Crear Nuevo Usuario</h2>
                    <span class="close-modal">&times;</span>
                </div>
                <form id="modalUserForm" class="form">
                    <div class="form-group">
                        <label for="modalUsername">Nombre</label>
                        <input type="text" id="modalUserName" required>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">Contraseña</label>
                        <input type="password" id="modalUserPassword" placrequired>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">rol</label>
                        <select name="modalRole" id="modalRole">
                            <option value="admin">Administrador</option>
                            <option value="logis">Logística</option>
                        </select>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn-modal-crear">Crear Usuario</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="editUserModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Editar Usuario</h2>
                    <span class="close-modal">&times;</span>
                </div>
                <form id="modalEditUserForm" class="form">
                    <div class="form-group">
                        <label for="modalUsername">Nombre</label>
                        <input type="text" id="modalEditUserName" required>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">Contraseña</label>
                        <input type="password" id="modalEditUserPassword" placrequired>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">rol</label>
                        <select name="modalRole" id="modalEditUserRole">
                            <option value="admin">Administrador</option>
                            <option value="logis">Logística</option>
                        </select>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn-modal-crear">Crear Usuario</button>
                    </div>
                </form>
            </div>
        </div>
        <section id="vendedoresSection" style="display: none;">
            <h1>Lista de Vendedores</h1>
            <div class="btn-wrapper">
                <button class="btn-crear">Agregar Aliado</button>
            </div>
            <div class="table-container">
                <?php
                $stmtVendedores = $pdo->query("SELECT id, name, email, nit, address, contact FROM allies");
                $vendedores = $stmtVendedores->fetchAll();
                ?>
                <?php if (empty($vendedores)): ?>
                    <p>No hay vendedores registrados aún.</p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>NIT</th>
                                <th>Direccion</th>
                                <th>Contacto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vendedores as $vendedor): ?>
                                <tr>
                                    <td><?= $vendedor['id'] ?></td>
                                    <td><?= htmlspecialchars($vendedor['name']) ?></td>
                                    <td><?= $vendedor['email'] ?></td>
                                    <td><?= $vendedor['nit'] ?></td>
                                    <td><?= $vendedor['address'] ?></td>
                                    <td><?= $vendedor['contact'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </section>
        <div id="allieModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Crear Nuevo Aliado</h2>
                    <span class="close-modal">&times;</span>
                </div>
                <form id="modalAllieForm" class="form">
                    <div class="form-group">
                        <label for="modalUsername">Nombre</label>
                        <input type="text" id="modalName" required>
                    </div>
                    <div class="form-group">
                        <label for="modalUsername">Correo</label>
                        <input type="email" id="modalEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">Contraseña</label>
                        <input type="password" id="modalPassword" placrequired>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">Direccion</label>
                        <input type="text" id="modalAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">NIT</label>
                        <input type="number" id="modalNit" required>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">Contacto</label>
                        <input type="number" id="modalContact" required>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-modal-crear">Crear Aliado</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="editAllieModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Editar Aliado</h2>
                    <span class="close-modal">&times;</span>
                </div>
                <form id="modalEditAllieForm" class="form">
                    <div class="form-group">
                        <label for="modalUsername">Nombre</label>
                        <input type="text" id="modalEditName" required>
                    </div>
                    <div class="form-group">
                        <label for="modalUsername">Correo</label>
                        <input type="email" id="modalEditEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">Contraseña</label>
                        <input type="password" id="modalEditPassword" placrequired>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">Direccion</label>
                        <input type="text" id="modalEditAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">NIT</label>
                        <input type="number" id="modalEditNit" required>
                    </div>
                    <div class="form-group">
                        <label for="modalPassword">Contacto</label>
                        <input type="number" id="modalEditContact" required>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn-modal-editar">Actualizar Aliado</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<?php require_once '../templates/footer.php'; ?>
<script src="../js/admin.js"></script>