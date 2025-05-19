// cotizador.js

const costos = {
    'Bogotá': {
        'Medellín': {
            '1-2': 15000,
            '2.1-10': 20000,
            '10.1-30': 30000,
            'extra': 800
        }
    },
    'Medellín': {
        'Bogotá': {
            '1-2': 15000,
            '2.1-10': 20000,
            '10.1-30': 30000,
            'extra': 800
        },
        'Bello': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'Caldas': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'Copacabana': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'Envigado': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'Girardota': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'Itagüí': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'La Estrella': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'Sabaneta': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'Alta Vista': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'San Antonio de Prado': {
           '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'Santa Elena': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'Palmitas': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'San Cristóbal': {
            '1-2': 15000,
            '2.1-10': 18000,
            '10.1-30': 22000,
            'extra': 400
        },
        'Chocó-Acandí': {
            '1-2': 20000,
            '2.1-10': 30000,
            '10.1-30': 48000,
            'extra': 1200
        },
        'Chocó-Certeguí': {
            '1-2': 40000,
            '2.1-10': 70000,
            '10.1-30': 140000,
            'extra': 3000
        },
        'Chocó-Condoto': {
            '1-2': 20000,
            '2.1-10': 30000,
            '10.1-30': 48000,
            'extra': 1200
        },
        'Chocó- El dos': {
            '1-2': 20000,
            '2.1-10': 30000,
            '10.1-30': 48000,
            'extra': 1200
        },
        'Chocó-La Y': {
            '1-2': 20000,
            '2.1-10': 30000,
            '10.1-30': 48000,
            'extra': 1200
        },
        'Chocó- Las Animas': {
            '1-2': 20000,
            '2.1-10': 30000,
            '10.1-30': 48000,
            'extra': 1200
        },
        'Chocó- Nóvita': {
           '1-2': 20000,
            '2.1-10': 30000,
            '10.1-30': 48000,
            'extra': 1200
        },
        'Chocó-Quibdó': {
            '1-2': 20000,
            '2.1-10': 30000,
            '10.1-30': 48000,
            'extra': 1200
        },
        'Chocó-Tadó': {
            '1-2': 20000,
            '2.1-10': 30000,
            '10.1-30': 48000,
            'extra': 1200
        },
        'Chocó-Tutumendo': {
            '1-2': 20000,
            '2.1-10': 30000,
            '10.1-30': 48000,
            'extra': 1200
        },
        'Chocó-Yutó': {
            '1-2': 20000,
            '2.1-10': 30000,
            '10.1-30': 48000,
            'extra': 1200
        },
        'Apartadó': {
            '1-2': 20000,
            '2.1-10': 28000,
            '10.1-30': 40000,
            'extra': 900
        },
        'Cañasgordas': {
            '1-2': 20000,
            '2.1-10': 28000,
            '10.1-30': 40000,
            'extra': 900
        },
        'Capurganá': {
           '1-2': 20000,
            '2.1-10': 28000,
            '10.1-30': 40000,
            'extra': 900
        },
        'Carepa': {
            '1-2': 20000,
            '2.1-10': 28000,
            '10.1-30': 40000,
            'extra': 900
        },
        'Chigorodó': {
           '1-2': 20000,
            '2.1-10': 28000,
            '10.1-30': 40000,
            'extra': 900
        },
        'Currulao': {
            '1-2': 20000,
            '2.1-10': 28000,
            '10.1-30': 40000,
            'extra': 900
        },
        'Mutatá': {
            '1-2': 20000,
            '2.1-10': 28000,
            '10.1-30': 40000,
            'extra': 900
        },
        'Necoclí': {
            '1-2': 20000,
            '2.1-10': 28000,
            '10.1-30': 40000,
            'extra': 900
        },
        'Riosucio': {
           '1-2': 20000,
            '2.1-10': 28000,
            '10.1-30': 40000,
            'extra': 900
        },
        'Turbo': {
           '1-2': 20000,
            '2.1-10': 28000,
            '10.1-30': 40000,
            'extra': 900
        },
        'Uramita': {
            '1-2': 20000,
            '2.1-10': 28000,
            '10.1-30': 40000,
            'extra': 900
        }
    }
};

const opcionesMedellin = `
            <option value="Bello">Bello</option>
            <option value="Bogotá">Bogotá</option>
            <option value="Caldas">Caldas</option>
            <option value="Copacabana">Copacabana</option>
            <option value="Envigado">Envigado</option
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
            <option value="Chocó-El dos">Chocó-El dos</option>
            <option value="Chocó-La Y">Chocó-La Y</option>
            <option value="Chocó-Las Animas">Chocó-Las Animas</option>
            <option value="Chocó-Nóvita">Chocó-Nóvita</option>
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
            <option value="Uramita">Uramita</option>`;

const origenSelect = document.getElementById('origen');
const destinoSelect = document.getElementById('destino');
const cotizarBtn = document.getElementById('cotizarBtn');
const detalleEnvio = document.getElementById('detalleEnvio');
const resultadoModal = document.getElementById('resultadoModal');
const closeBtn = document.querySelector('.close-btn');

// modal error 
const modalError = document.getElementById('modalError');
const errorMessage = document.getElementById('errorMessage');
const closeModalBtn = document.querySelector('.close-btn');

cotizarBtn.addEventListener('click', () => {
    const fecha = document.getElementById('fecha').value;
    const origen = origenSelect.value;
    const destino = destinoSelect.value;
    const peso = parseFloat(document.getElementById('peso').value);
    const valor = parseFloat(document.getElementById('valor').value);

    // Obtener las medidas en cm
    const ancho = parseFloat(document.getElementById('ancho').value);
    const largo = parseFloat(document.getElementById('largo').value);
    const alto = parseFloat(document.getElementById('alto').value);

    // Función para mostrar el modal de error con un mensaje personalizado
    const mostrarModalError = (mensaje) => {
        errorMessage.textContent = mensaje;
        modalError.style.display = 'flex';
    };

    // Función para cerrar el modal de error
    const cerrarModalError = () => {
        modalError.style.display = 'none';
    };

    // Mostrar el modal de error cuando el usuario haga clic en el botón de cerrar
    closeModalBtn.addEventListener('click', cerrarModalError);

    // Cuando el usuario haga clic fuera del modal, cerrarlo
    window.onclick = (event) => {
        if (event.target === modalError) {
            cerrarModalError();
        }
    };

   // Validación de campos requeridos
    if (!fecha || !origen || !destino || isNaN(peso) || peso <= 0 || isNaN(valor) || valor <= 0 || isNaN(ancho) || ancho <= 0 || isNaN(largo) || largo <= 0 || isNaN(alto) || alto <= 0) {
        mostrarModalError("Por favor, completa todos los campos con valores válidos.");
        return;
    }

    // Cálculo del peso volumétrico
    const volumen = (ancho / 100) * (largo / 100) * (alto / 100);  // Convertir a metros cúbicos
    const pesoVolumetrico = volumen * 400;


    // Obtener el peso mayor entre el peso real y el peso volumétrico
    const pesoFinal = Math.max(peso, pesoVolumetrico); // Aquí he utilizado directamente 'peso' como el peso real

    let costo;
    // Validación adicional: el origen debe ser diferente al destino
    if (origen === destino) {
        mostrarResultado("El origen y el destino no pueden ser la misma ciudad.");
        return;
    }

    // Cálculo del costo según el origen, destino y peso
    if (costos[origen] && costos[origen][destino]) {
        if (pesoFinal <= 2) {
            costo = costos[origen][destino]['1-2'];
        } else if (pesoFinal > 2 && pesoFinal <= 10) {
            costo = costos[origen][destino]['2.1-10'];
        } else if (pesoFinal > 10 && pesoFinal <= 30) {
            costo = costos[origen][destino]['10.1-30'];
        } else {
            costo = costos[origen][destino]['10.1-30'] + (pesoFinal - 30) * costos[origen][destino]['extra'];
        }
    } else {
        mostrarResultado('No hay disponibilidad para esta ruta.');
        return;
    }

    mostrarResultado(`
    El costo estimado de tu envío desde <strong>${origen}</strong> hacia <strong>${destino}</strong> es: <strong>${formatearCosto(costo)}</strong><br><br>
    Peso real ingresado: <strong>${peso.toFixed(2)} kg</strong><br>
    Peso volumétrico calculado: <strong>${pesoVolumetrico.toFixed(2)} kg</strong>`);
    abrirModal();
});

// Obtener el botón de Programar recogida
const programarRecogidaBtn = document.getElementById('programarRecogida');

// Definir el número de WhatsApp y el mensaje
const numeroWhatsApp = '573168218177'; // número de WhatsApp
const mensaje = 'Hola, quiero programar una recogida de envío.'; // Mensaje predefinido

// Agregar evento al botón
programarRecogidaBtn.addEventListener('click', function () {
    // Construir la URL de WhatsApp
    const urlWhatsApp = `https://wa.me/${numeroWhatsApp}?text=${encodeURIComponent(mensaje)}`;
    // Abrir WhatsApp en una nueva ventana
    window.open(urlWhatsApp, '_blank');
});

// Actualizar lista de destinos según el origen seleccionado
origenSelect.addEventListener('change', () => {
    const origen = origenSelect.value;
    destinoSelect.innerHTML = ''; // Limpia las opciones actuales en destino

    if (origen === 'Bogotá') {
        // Si el origen es Bogotá, solo permite Medellín como destino
        destinoSelect.innerHTML = '<option value="Medellín">Medellín</option>';
    } else if (origen === 'Medellín') {
        // Si el origen es Medellín, muestra todos los destinos
        destinoSelect.innerHTML = opcionesMedellin;
    } else {
        // Para cualquier otro origen, puedo agregar opciones adicionales si es necesario
    }
});

const formatearCosto = (costo) => costo.toLocaleString("es-CO", { style: "currency", currency: "COP" });

const mostrarResultado = (mensaje) => {
    detalleEnvio.innerHTML = mensaje;
};

const abrirModal = () => {
    resultadoModal.style.display = 'flex';
};


document.addEventListener("DOMContentLoaded", function() {
    const closeBtn = document.querySelector('.close-btn');
    if (closeBtn) {
        closeBtn.addEventListener('click', cerrarModal);
    }
});

// Validación de fecha en HTML
document.getElementById('fecha').addEventListener('change', function() {
    const fechaSeleccionada = new Date(this.value);
    const fechaActual = new Date();
    fechaActual.setHours(0, 0, 0, 0);

    if (fechaSeleccionada < fechaActual) {
        document.getElementById('fechaError').style.display = 'block';
        this.value = '';
    } else {
        document.getElementById('fechaError').style.display = 'none';
    }
});

function cerrarModal() {
    // Lógica para cerrar el modal
    document.getElementById('resultadoModal').style.display = 'none'; // Ejemplo de ocultar un modal
}

window.onload = function() {
    // Tu código que llama a cerrarModal
    document.getElementById('close-btn').onclick = cerrarModal; //Error: La ID no coincidía 
};

document.addEventListener("DOMContentLoaded", function() {
    const modal = document.getElementById('resultadoModal');
    const closeBtn = document.querySelector('.close-btn');

    console.log(modal); // Verifica si el modal se encuentra correctamente
    console.log(closeBtn); // Verifica si el botón de cerrar se encuentra correctamente

    if (closeBtn) {
        closeBtn.addEventListener('click', cerrarModal);
    }
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') { // Verifica si la tecla presionada es 'Esc'
        cerrarModal();
    }
});


// Error de fecha en HTML
document.getElementById('fecha').insertAdjacentHTML('afterend', '<p id="fechaError" style="display:none;color:red;">La fecha no puede ser igual o anterior a hoy.</p>');


function reiniciarFormulario() {
    // Reset all form inputs
    document.getElementById('fecha').value = '';
    document.getElementById('origen').selectedIndex = 0;
    actualizarDestino();
    document.getElementById('peso').value = '';
    document.getElementById('ancho').value = '';
    document.getElementById('largo').value = '';
    document.getElementById('alto').value = '';
    document.getElementById('valor').value = '';
}


document.getElementById('close-btn').addEventListener('click', () => {
    cerrarModal(); 
    reiniciarFormulario(); 
});

function actualizarDestino() {
    const destino = document.getElementById('destino');

    // Limpiar las opciones actuales del destino
    destino.innerHTML = '';

    // Agregar la lista de opciones correspondientes al index = 0 del input destino
    destino.innerHTML = opcionesMedellin;
}
