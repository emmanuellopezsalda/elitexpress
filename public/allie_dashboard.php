<?php
require_once '../includes/session.php';
requireLogin();

require_once '../config/database.php';

$pdo = getPDO();

$seller_id = $_SESSION['usuario_id'];

$stmt = $pdo->prepare("SELECT * FROM orders WHERE seller_id = :seller_id ORDER BY created_at DESC");
$stmt->bindParam(':seller_id', $seller_id, PDO::PARAM_INT);
$stmt->execute();
$orders = $stmt->fetchAll();
?>

<?php require_once '../templates/header.php'; ?>

<link rel="stylesheet" href="../css/admin.css">
<div class="admin-layout">
    <aside class="sidebar">
        <h2><?= $_SESSION["aliado"] ?></h2>
        <nav>
            <ul class="menu-list">
                <li><button id="menuEnvios" class="menu-btn">Envíos</button></li>
                <form action="../handlers/logout.php" method="POST" style="display:inline;">
                    <button type="submit">Cerrar sesión</button>
                </form>
            </ul>
        </nav>
    </aside>
    <main class="main-content">
        <section id="enviosSection">
            <h1>Gestión de Envíos</h1>
            <div class="btn-wrapper">
                <button class="btn-crear">Crear Nuevo Envío</button>
            </div>
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
                                <th>Fecha</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Peso (kg)</th>
                                <th>Ancho (cm)</th>
                                <th>Altura(cm)</th>
                                <th>Valor Comercial</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                                <tr>
                                    <td><?= $order['id'] ?></td>
                                    <td><?= $order['created_at'] ?></td>
                                    <td><?= htmlspecialchars($order['origin'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($order['destination'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($order['weight'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($order['width'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($order['height'] ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($order['total'] ?? 'N/A') ?></td>
                                    <td>
                                        <button class="btn-view" data-id="<?= $order['id'] ?>">Ver</button>
                                        <button class="btn-edit" data-id="<?= $order['id'] ?>">Editar</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </section>
    </main>
</div>
<div id="envioModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Crear Nuevo Envío</h2>
            <span class="close-modal">&times;</span>
        </div>
        <form id="modalEnvioForm" class="form" action="../process/create_order.php" method="POST">
            <input type="text" name="seller_id" value=<?= $_SESSION["usuario_id"] ?> hidden>
            <div class="form-group">
                <label for="origin">Origen:</label>
                <select id="origin" name="origin" required>
                    <option value="">Seleccione origen</option>
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
            </div>
            <div class="form-group">
                <label for="destination">Destino:</label>
                <select id="destination" name="destination" required>
                    <option value="">Seleccione destino</option>
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
            </div>
            <div class="form-group">
                <label for="weight">Peso (kg):</label>
                <input type="number" id="weight" name="weight" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="width">Ancho (cm):</label>
                <input type="number" id="width" name="width" step="0.1" min="0" required>
            </div>
            <div class="form-group">
                <label for="height">Altura (cm):</label>
                <input type="number" id="height" name="height" step="0.1" min="0" required>
            </div>
            <div class="form-group">
                <label for="height">Nombre de quien recibe:</label>
                <input type="text" id="recipient_name" name="recipient_name" required>
            </div>
            <div class="form-group">
                <label abel for="height">Dirección de quien recibe:</label>
                <input type="text" id="recipient_address" name="recipient_address" required>
            </div>
            <div class="form-group">
                <label for="height">Teléfono de quien recibe:</label>
                <input type="text" id="recipient_phone" name="recipient_phone" required>
            </div>
            <div class="form-group">
                <label for="total">Valor Comercial:</label>
                <input type="number" id="total" name="total" step="0.01" min="0" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-modal-crear submit-btn">Crear Envío</button>
            </div>
        </form>
    </div>
</div>
<?php require_once '../templates/footer.php'; ?>
<script src="../js/quoter.js"></script>