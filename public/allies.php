<?php require_once '../templates/header.php'; ?>
<?php
    require_once '../includes/session.php';
    requireLogin();

    require_once '../config/database.php';

    $pdo = getPDO();
?>
<link rel="stylesheet" href="../css/allies.css">
<header>
    <div class="container">
        <div class="logo">
            <img src="https://elitexpress.co/wp-content/uploads/2024/09/LOGO.png" alt="EliteXpress Logo">
            <div class="user-info">
                <span>¡Bienvenido <?= $_SESSION["aliado"] ?>!</span>
                <form action="../handlers/logout.php" method="POST" style="display:inline;">
                    <button type="submit" class="btn">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>
</header>

<main class="container">
    <div class="tabs">
        <button class="tab-button active" onclick="openTab(event, 'cotizacion')">Cotización</button>
        <button class="tab-button" onclick="openTab(event, 'recogida')">Solicitar Recogida</button>
    </div>
    <div id="cotizacion" class="tab-content active">
        <div class="form-container">
            <h2 class="form-title">Cotizar Envío</h2>
            <form id="cotizacion-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="origen">Ciudad de Origen</label>
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
                        <label for="destino">Ciudad de Destino</label>
                        <select id="destination" name="destination" required>
                            <option value="">Seleccione destino</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="valor-declarado">Valor Declarado (COP)</label>
                        <input type="number" id="valor-declarado" placeholder="0" min="0" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="peso">Peso (kg)</label>
                        <input type="number" id="weight" name="weight" placeholder="0.0" step="0.1" min="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="alto">Alto (cm)</label>
                        <input type="number" id="height" name="height" placeholder="0" min="1" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="ancho">Ancho (cm)</label>
                        <input type="number" id="width" name="width" placeholder="0" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="largo">Largo (cm)</label>
                        <input type="number" id="length" name="length" placeholder="0" min="1" required>
                    </div>
                </div>
                <input type="number" id="total" name="total" hidden>
                <div class="actions">
                    <button type="button" class="btn btn-secondary"
                        onclick="limpiarFormulario('cotizacion-form')">Limpiar</button>
                    <button type="button" class="btn" onclick="mostrarCotizacion()">Cotizar</button>
                </div>
            </form>
        </div>
    </div>

    <div id="recogida" class="tab-content">
        <!-- FORMULARIO PRINCIPAL QUE ENVÍA TODOS LOS DATOS -->
        <form action="../process/create_order.php" method="POST" id="form-solicitar-recogida">
            
            <!-- Campo oculto para seller_id -->
            <input type="hidden" name="seller_id" value="<?= $_SESSION["usuario_id"] ?>">
            
            <div class="form-container">
                <h2 class="form-title">Tipo de Cliente</h2>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="persona-natural" name="tipo_cliente" value="persona" checked
                            onchange="cambiarTipoCliente()">
                        <label for="persona-natural">Persona Natural</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="empresa" name="tipo_cliente" value="empresa"
                            onchange="cambiarTipoCliente()">
                        <label for="empresa">Empresa</label>
                    </div>
                </div>
            </div>

            <div class="form-container">
                <h2 class="form-title">Datos del Remitente</h2>
                
                <div id="campos-persona">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="client_name">Nombre Completo</label>
                            <input type="text" id="client_name" name="client_name" required>
                        </div>
                        <div class="form-group">
                            <label for="client_document">Número de Documento</label>
                            <input type="number" id="client_document" name="client_document" required>
                        </div>
                    </div>
                </div>

                <div id="campos-empresa" style="display: none;">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="client_company">Razón Social</label>
                            <input type="text" id="client_company" name="client_company">
                        </div>
                        <div class="form-group">
                            <label for="client_nit">NIT</label>
                            <input type="number" id="client_nit" name="client_nit">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="client_phone">Teléfono</label>
                        <input type="tel" id="client_phone" name="client_phone" required>
                    </div>
                    <div class="form-group">
                        <label for="client_email">Correo Electrónico</label>
                        <input type="email" id="client_email" name="client_email">
                    </div>
                </div>
            </div>

            <div class="form-container">
                <h2 class="form-title">Datos del Destinatario</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="receiver_name">Nombre Completo</label>
                        <input type="text" id="receiver_name" name="receiver_name" required>
                    </div>
                    <div class="form-group">
                        <label for="destinatario-documento">Número de Documento</label>
                        <input type="text" id="destinatario-documento" name="destinatario_documento">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="receiver_phone">Teléfono</label>
                        <input type="tel" id="receiver_phone" name="receiver_phone" required>
                    </div>
                    <div class="form-group">
                        <label for="destinatario-email">Correo Electrónico</label>
                        <input type="email" id="destinatario-email" name="destinatario_email">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="receiver_address">Dirección</label>
                        <input type="text" id="receiver_address" name="receiver_address" required>
                    </div>
                </div>
            </div>

            <div class="form-container">
                <h2 class="form-title">Detalles del Envío</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="origin">Ciudad de Origen</label>
                        <select id="envio-origen" name="origin" required>
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
                        <label for="destination">Ciudad de Destino</label>
                        <select id="envio-destino" name="destination">
                            <option value="">Seleccione destino</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="commercial_value">Valor Declarado (COP)</label>
                        <input type="number" id="envio-valor" name="commercial_value" placeholder="0" min="0" required>
                    </div>
                </div>
                
                <!-- Campo oculto para el total -->
                <input type="hidden" id="envio-total" name="total" value="0">
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="weight">Peso (kg)</label>
                        <input type="number" id="envio-peso" name="weight" placeholder="0.0" step="0.1" min="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="envio-dimensiones">Dimensiones (Alto x Ancho x Largo cm)</label>
                        <div style="display: flex; gap: 10px;">
                            <input type="number" id="envio-alto" name="height" placeholder="Alto" min="1" required
                                style="width: 33%;">
                            <input type="number" id="envio-ancho" name="width" placeholder="Ancho" min="1" required
                                style="width: 33%;">
                            <input type="number" id="envio-largo" name="length" placeholder="Largo" min="1" required
                                style="width: 33%;">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="description">Descripción del Contenido</label>
                        <textarea id="description" name="description" rows="3" required></textarea>
                    </div>
                </div>

                <div class="actions">
                    <button type="button" class="btn btn-secondary"
                        onclick="limpiarFormulario('form-solicitar-recogida')">Limpiar</button>
                    <button type="submit" class="btn">Solicitar Recogida</button>
                </div>
            </div>
        </form>
    </div>
</main>

<div id="modal-cotizacion" class="modal-overlay">
    <div class="modal">
        <button class="modal-close" onclick="cerrarModal()">&times;</button>
        <h3 class="modal-title">Resultado de la Cotización</h3>
        <div class="quote-result">
            <div class="price"></div>
            <div class="detail-row">
                <span>Volumen:</span>
                <span class="volumen-span"></span>
            </div>
            <div class="detail-row">
                <span>Peso:</span>
                <span class="peso-span"></span>
            </div>
            <div class="actions">
                <button type="button" class="btn btn-success" onclick="irARecogida()">Solicitar Recogida</button>
            </div>
        </div>
    </div>
</div>

<script src="../js/allie.js"></script>