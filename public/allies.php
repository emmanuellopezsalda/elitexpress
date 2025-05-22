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
        <div class="form-container">
            <h2 class="form-title">Tipo de Cliente</h2>
            <div class="radio-group">
                <div class="radio-option">
                    <input type="radio" id="persona-natural" name="tipo-cliente" value="persona" checked
                        onchange="cambiarTipoCliente()">
                    <label for="persona-natural">Persona Natural</label>
                </div>
                <div class="radio-option">
                    <input type="radio" id="empresa" name="tipo-cliente" value="empresa"
                        onchange="cambiarTipoCliente()">
                    <label for="empresa">Empresa</label>
                </div>
            </div>
        </div>

        <div class="form-container">
            <h2 class="form-title">Datos del Remitente</h2>
            <form id="recogida-form">
                <div id="campos-persona">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="remitente-nombre">Nombre Completo</label>
                            <input type="text" id="remitente-nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="remitente-documento">Número de Documento</label>
                            <input type="text" id="remitente-documento" required>
                        </div>
                    </div>
                </div>

                <div id="campos-empresa" style="display: none;">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="remitente-razon-social">Razón Social</label>
                            <input type="text" id="remitente-razon-social">
                        </div>
                        <div class="form-group">
                            <label for="remitente-nit">NIT</label>
                            <input type="text" id="remitente-nit">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="remitente-contacto">Nombre de Contacto</label>
                            <input type="text" id="remitente-contacto">
                        </div>
                        <div class="form-group">
                            <label for="remitente-cargo">Cargo</label>
                            <input type="text" id="remitente-cargo">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="remitente-telefono">Teléfono</label>
                        <input type="tel" id="remitente-telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="remitente-email">Correo Electrónico</label>
                        <input type="email" id="remitente-email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="remitente-direccion">Dirección</label>
                        <input type="text" id="remitente-direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="remitente-ciudad">Ciudad</label>
                        <select id="remitente-ciudad" required>
                            <option value="">Seleccione ciudad</option>
                            <option value="bogota">Bogotá</option>
                            <option value="medellin">Medellín</option>
                            <option value="cali">Cali</option>
                            <option value="barranquilla">Barranquilla</option>
                            <option value="cartagena">Cartagena</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div class="form-container">
            <h2 class="form-title">Datos del Destinatario</h2>
            <form>
                <div class="form-row">
                    <div class="form-group">
                        <label for="destinatario-nombre">Nombre Completo</label>
                        <input type="text" id="destinatario-nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="destinatario-documento">Número de Documento</label>
                        <input type="text" id="destinatario-documento" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="destinatario-telefono">Teléfono</label>
                        <input type="tel" id="destinatario-telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="destinatario-email">Correo Electrónico</label>
                        <input type="email" id="destinatario-email">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="destinatario-direccion">Dirección</label>
                        <input type="text" id="destinatario-direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="destinatario-ciudad">Ciudad</label>
                        <select id="destinatario-ciudad" required>
                            <option value="">Seleccione ciudad</option>
                            <option value="bogota">Bogotá</option>
                            <option value="medellin">Medellín</option>
                            <option value="cali">Cali</option>
                            <option value="barranquilla">Barranquilla</option>
                            <option value="cartagena">Cartagena</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <div class="form-container">
            <h2 class="form-title">Detalles del Envío</h2>
            <form>
                <div class="form-row">
                    <div class="form-group">
                        <label for="envio-tipo">Tipo de Envío</label>
                        <select id="envio-tipo" required>
                            <option value="">Seleccione tipo</option>
                            <option value="documento">Documento</option>
                            <option value="paquete">Paquete</option>
                            <option value="mercancia">Mercancía</option>
                            <option value="fragil">Frágil</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="envio-valor">Valor Declarado (COP)</label>
                        <input type="number" id="envio-valor" placeholder="0" min="0" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="envio-peso">Peso (kg)</label>
                        <input type="number" id="envio-peso" placeholder="0.0" step="0.1" min="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="envio-dimensiones">Dimensiones (Alto x Ancho x Largo cm)</label>
                        <div style="display: flex; gap: 10px;">
                            <input type="number" id="envio-alto" placeholder="Alto" min="1" required
                                style="width: 33%;">
                            <input type="number" id="envio-ancho" placeholder="Ancho" min="1" required
                                style="width: 33%;">
                            <input type="number" id="envio-largo" placeholder="Largo" min="1" required
                                style="width: 33%;">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="fecha-recogida">Fecha de Recogida</label>
                        <input type="date" id="fecha-recogida" required>
                    </div>
                    <div class="form-group">
                        <label for="hora-recogida">Hora de Recogida</label>
                        <select id="hora-recogida" required>
                            <option value="">Seleccione hora</option>
                            <option value="8-12">8:00 AM - 12:00 PM</option>
                            <option value="12-14">12:00 PM - 2:00 PM</option>
                            <option value="14-18">2:00 PM - 6:00 PM</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="envio-descripcion">Descripción del Contenido</label>
                        <textarea id="envio-descripcion" rows="3" required></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="envio-observaciones">Observaciones Adicionales</label>
                        <textarea id="envio-observaciones" rows="3"></textarea>
                    </div>
                </div>

                <div class="actions">
                    <button type="button" class="btn btn-secondary"
                        onclick="limpiarFormulario('recogida-form')">Limpiar</button>
                    <button type="button" class="btn" onclick="procesarRecogida()">Solicitar Recogida</button>
                </div>
            </form>
        </div>
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