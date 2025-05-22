const originSelect = document.getElementById("origin");
const destinationSelect = document.getElementById("destination");
const weightInput = document.getElementById("weight");
const heightInput = document.getElementById("height");
const widthInput = document.getElementById("width");
const lengthInput = document.getElementById("length");
const commerciaValueInput = document.getElementById("valor-declarado");
const quotationDiv = document.querySelector(".quote-result");
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

originSelect.addEventListener("change", () => {
    const origin = originSelect.value;
    if (destinationSelect) {
        destinationSelect.innerHTML = '<option value="">Seleccione destino</option>';
        if (costos[origin]) {
            Object.keys(costos[origin]).forEach(destino => {
                const option = document.createElement('option');
                option.value = destino;
                option.textContent = destino;
                destinationSelect.appendChild(option);
            });
        } else if (origin === 'Bello' || origin === 'Caldas' || origin === 'Copacabana' ||
            origin === 'Envigado' || origin === 'Girardota' || origin === 'Itagüí' ||
            origin === 'La Estrella' || origin === 'Sabaneta' || origin === 'Alta Vista' ||
            origin === 'San Antonio de Prado' || origin === 'Santa Elena' || origin === 'Palmitas' ||
            origin === 'San Cristóbal') {
            const option = document.createElement('option');
            option.value = 'Medellín';
            option.textContent = 'Medellín';
            destinationSelect.appendChild(option);
        }
    }
})

function calcularCotizacion() {
    const origen = originSelect?.value;
    const destino = destinationSelect?.value;
    const peso = parseFloat(weightInput?.value || '0');
    const ancho = parseFloat(widthInput?.value || '0');
    const alto = parseFloat(heightInput?.value || '0');
    const largo = parseFloat(lengthInput?.value || '0');
    const valor = parseFloat(commerciaValueInput?.value || '0');
    const total = document.getElementById("total");


    if (!origen || !destino || !peso || !ancho || !alto || !largo || !valor) {
        alert('Por favor, complete todos los campos requeridos para la cotización.');
        return;
    }

    if (origen === destino) {
        alert('El origen y el destino no pueden ser la misma ciudad.');
        return;
    }

    // Calcular volumen en metros cúbicos
    const volumen = (ancho * alto * largo) / 1000000;

    const pesoVolumetrico = volumen * 400;
    const pesoFinal = Math.max(peso, pesoVolumetrico);

    let costo;
    let rutaInvertida = false;

    if (costos[origen] && costos[origen][destino]) {
        if (pesoFinal <= 2) {
            costo = costos[origen][destino]['1-2'];
        } else if (pesoFinal <= 10) {
            costo = costos[origen][destino]['2.1-10'];
        } else if (pesoFinal <= 30) {
            costo = costos[origen][destino]['10.1-30'];
        } else {
            costo = costos[origen][destino]['10.1-30'] + (pesoFinal - 30) * costos[origen][destino]['extra'];
        }
    } else if (costos[destino] && costos[destino][origen]) {
        rutaInvertida = true;
        if (pesoFinal <= 2) {
            costo = costos[destino][origen]['1-2'];
        } else if (pesoFinal <= 10) {
            costo = costos[destino][origen]['2.1-10'];
        } else if (pesoFinal <= 30) {
            costo = costos[destino][origen]['10.1-30'];
        } else {
            costo = costos[destino][origen]['10.1-30'] + (pesoFinal - 30) * costos[destino][origen]['extra'];
        }
    } else {
        alert('No hay disponibilidad para esta ruta.');
        return;
    }

    const costoFormateado = costo.toLocaleString('es-CO', {
        style: 'currency',
        currency: 'COP',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    });

    total.value = costo;

    if (quotationDiv) {
        const price = quotationDiv.querySelector(".price");
        const volumeSpan = quotationDiv.querySelector(".volumen-span");
        const weightSpan = quotationDiv.querySelector(".peso-span");
        price.innerHTML = costoFormateado;
        volumeSpan.innerHTML = volumen.toFixed(3) + "m³";
        weightSpan.innerHTML =pesoFinal.toFixed(2)+ "kg";
    }
    return true;
}

function openTab(evt, tabName) {
    let tabContents = document.getElementsByClassName("tab-content");
    for (let i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.remove("active");
    }
    let tabButtons = document.getElementsByClassName("tab-button");
    for (let i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove("active");
    }
    document.getElementById(tabName).classList.add("active");
    evt.currentTarget.classList.add("active");
}

function mostrarCotizacion() {
    if(calcularCotizacion()) {
        document.getElementById("modal-cotizacion").classList.add("active");
    };
}

function cerrarModal() {
    document.getElementById("modal-cotizacion").classList.remove("active");
}

function irARecogida() {
    cerrarModal();

    let event = { currentTarget: document.getElementsByClassName("tab-button")[1] };
    openTab(event, "recogida");

    document.getElementById("envio-tipo").value = document.getElementById("tipo-envio").value;
    document.getElementById("envio-valor").value = document.getElementById("valor-declarado").value;
    document.getElementById("envio-peso").value = document.getElementById("peso").value;
    document.getElementById("envio-alto").value = document.getElementById("alto").value;
    document.getElementById("envio-ancho").value = document.getElementById("ancho").value;
    document.getElementById("envio-largo").value = document.getElementById("largo").value;

    document.getElementById("remitente-ciudad").value = document.getElementById("origen").value;
    document.getElementById("destinatario-ciudad").value = document.getElementById("destino").value;
}

function cambiarTipoCliente() {
    let tipoCliente = document.querySelector('input[name="tipo-cliente"]:checked').value;

    if (tipoCliente === "persona") {
        document.getElementById("campos-persona").style.display = "block";
        document.getElementById("campos-empresa").style.display = "none";
    } else {
        document.getElementById("campos-persona").style.display = "none";
        document.getElementById("campos-empresa").style.display = "block";
    }
}

function limpiarFormulario(formId) {
    document.getElementById(formId).reset();
}

function procesarRecogida() {
    alert("¡Solicitud de recogida procesada correctamente! Un mensajero pasará en la fecha y hora indicada.");
}

window.onclick = function (event) {
    let modal = document.getElementById("modal-cotizacion");
    if (event.target == modal) {
        cerrarModal();
    }
}
