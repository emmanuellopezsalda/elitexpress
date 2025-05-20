document.addEventListener('DOMContentLoaded', function () {
    const envioModal = document.getElementById('envioModal');
    const modalEnvioForm = document.getElementById('modalEnvioForm');
    const closeModal = document.querySelector(".close-modal");
    const addEnvioButton = document.querySelector(".btn-crear");
    const form = document.querySelector(".form");
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

    if (addEnvioButton) {
        addEnvioButton.addEventListener('click', () => {
            if (envioModal) {
                envioModal.classList.add('active');
            }
        });
    }

    if (closeModal && form) {
        closeModal.addEventListener("click", () => {
            form.reset();
            envioModal.classList.remove("active");
        });
    }

    window.addEventListener("click", (event) => {
        if (event.target === envioModal && form) {
            form.reset();
            envioModal.classList.remove("active");
        }
    });

    const filterBtn = document.getElementById('filterBtn');
    const filterOrigen = document.getElementById('filterOrigen');
    const filterDestino = document.getElementById('filterDestino');
    const enviosTable = document.getElementById('enviosTable');

    if (filterBtn && filterOrigen && filterDestino && enviosTable) {
        filterBtn.addEventListener('click', () => {
            const origen = filterOrigen.value.toLowerCase();
            const destino = filterDestino.value.toLowerCase();

            const rows = enviosTable.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const rowOrigen = row.cells[2].textContent.toLowerCase();
                const rowDestino = row.cells[3].textContent.toLowerCase();

                let mostrar = true;

                if (origen && !rowOrigen.includes(origen)) {
                    mostrar = false;
                }

                if (destino && !rowDestino.includes(destino)) {
                    mostrar = false;
                }

                row.style.display = mostrar ? '' : 'none';
            });
        });
    }

    // Mensajes de alerta
    const alertMessage = document.querySelector('.alert');
    if (alertMessage) {
        setTimeout(() => {
            alertMessage.remove();
        }, 5000);
    }

    // Elementos del formulario para cotización
    const originSelect = document.getElementById('origin');
    const destinationSelect = document.getElementById('destination');
    const weightInput = document.getElementById('weight');
    const widthInput = document.getElementById('width');
    const heightInput = document.getElementById('height');
    const commerciaValueInput = document.getElementById('commercial_value');
    const total = document.getElementById("total");

    // No establecemos un valor predeterminado para el campo valor comercial
    // Lo actualizaremos dinámicamente durante la cotización

    // Creamos un div para mostrar la cotización
    const quotationDiv = document.createElement('div');
    quotationDiv.id = 'quotationResult';
    quotationDiv.className = 'quotation-result';
    quotationDiv.style.marginTop = '15px';
    quotationDiv.style.marginBottom = '15px'; // Añadimos margen inferior
    quotationDiv.style.padding = '10px';
    quotationDiv.style.border = '1px solid #ddd';
    quotationDiv.style.borderRadius = '5px';
    quotationDiv.style.display = 'none';

    // Buscar el lugar donde insertar el div de cotización (antes de los botones)
    const buttonsArea = modalEnvioForm?.querySelector('.submit-btn')?.parentNode;
    
    // Agregar el div de cotización ANTES de los botones
    if (buttonsArea && modalEnvioForm) {
        modalEnvioForm.insertBefore(quotationDiv, buttonsArea);
    }

    // Crear botón para calcular cotización
    const quoteButton = document.createElement('button');
    quoteButton.type = 'button';
    quoteButton.id = 'quoteButton';
    quoteButton.className = 'btn-modal-cotizar';
    quoteButton.textContent = 'Calcular Cotización';
    quoteButton.style.marginRight = '10px';
    quoteButton.style.background = '#3498db';
    quoteButton.style.color = 'white';
    quoteButton.style.border = 'none';
    quoteButton.style.padding = '8px 15px';
    quoteButton.style.borderRadius = '4px';
    quoteButton.style.cursor = 'pointer';

    // Agregar el botón de cotización antes del botón de Crear Envío
    const submitBtn = modalEnvioForm?.querySelector('.submit-btn');
    if (submitBtn && submitBtn.parentNode) {
        submitBtn.parentNode.insertBefore(quoteButton, submitBtn);
    }

    if (originSelect) {
        originSelect.addEventListener('change', () => {
            const origen = originSelect.value;

            if (destinationSelect) {
                // Limpiar opciones actuales
                destinationSelect.innerHTML = '<option value="">Seleccione destino</option>';

                // Verificar si hay rutas disponibles desde el origen seleccionado
                if (costos[origen]) {
                    // Agregar destinos disponibles
                    Object.keys(costos[origen]).forEach(destino => {
                        const option = document.createElement('option');
                        option.value = destino;
                        option.textContent = destino;
                        destinationSelect.appendChild(option);
                    });
                } else if (origen === 'Bello' || origen === 'Caldas' || origen === 'Copacabana' ||
                    origen === 'Envigado' || origen === 'Girardota' || origen === 'Itagüí' ||
                    origen === 'La Estrella' || origen === 'Sabaneta' || origen === 'Alta Vista' ||
                    origen === 'San Antonio de Prado' || origen === 'Santa Elena' || origen === 'Palmitas' ||
                    origen === 'San Cristóbal') {
                    const option = document.createElement('option');
                    option.value = 'Medellín';
                    option.textContent = 'Medellín';
                    destinationSelect.appendChild(option);
                }
            }
        });
    }

    // Función para calcular la cotización
    function calcularCotizacion() {
        const origen = originSelect?.value;
        const destino = destinationSelect?.value;
        const peso = parseFloat(weightInput?.value || '0');
        const ancho = parseFloat(widthInput?.value || '0');
        const alto = parseFloat(heightInput?.value || '0');
        const valor = parseFloat(commerciaValueInput?.value || '0');

        // Validar campos requeridos
        if (!origen || !destino || !peso || !ancho || !alto || !valor) {
            alert('Por favor, complete todos los campos requeridos para la cotización.');
            return;
        }

        // Validar que origen y destino no sean iguales
        if (origen === destino) {
            alert('El origen y el destino no pueden ser la misma ciudad.');
            return;
        }

        // Calcular peso volumétrico
        const volumen = (ancho / 100) * (alto / 100); // Convertir a metros cúbicos
        const pesoVolumetrico = volumen * 400;

        // Determinar el peso a utilizar (el mayor entre real y volumétrico)
        const pesoFinal = Math.max(peso, pesoVolumetrico);

        let costo;
        let rutaInvertida = false;

        // Verificar disponibilidad de la ruta
        if (costos[origen] && costos[origen][destino]) {
            // Ruta directa
            if (pesoFinal <= 2) {
                costo = costos[origen][destino]['1-2'];
            } else if (pesoFinal > 2 && pesoFinal <= 10) {
                costo = costos[origen][destino]['2.1-10'];
            } else if (pesoFinal > 10 && pesoFinal <= 30) {
                costo = costos[origen][destino]['10.1-30'];
            } else {
                costo = costos[origen][destino]['10.1-30'] + (pesoFinal - 30) * costos[origen][destino]['extra'];
            }
        } else if (costos[destino] && costos[destino][origen]) {
            // Intentar con ruta invertida
            rutaInvertida = true;
            if (pesoFinal <= 2) {
                costo = costos[destino][origen]['1-2'];
            } else if (pesoFinal > 2 && pesoFinal <= 10) {
                costo = costos[destino][origen]['2.1-10'];
            } else if (pesoFinal > 10 && pesoFinal <= 30) {
                costo = costos[destino][origen]['10.1-30'];
            } else {
                costo = costos[destino][origen]['10.1-30'] + (pesoFinal - 30) * costos[destino][origen]['extra'];
            }
        } else {
            // No hay ruta disponible
            alert('No hay disponibilidad para esta ruta.');
            return;
        }

        // Formatear el costo como moneda colombiana
        const costoFormateado = costo.toLocaleString('es-CO', {
            style: 'currency',
            currency: 'COP',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
        total.value = costo;
        // Mostrar el resultado
        if (quotationDiv) {
            quotationDiv.innerHTML = `
                <h4>Cotización de Envío</h4>
                <p>Desde: <strong>${origen}</strong> hacia <strong>${destino}</strong></p>
                <p>Peso real: <strong>${peso.toFixed(2)} kg</strong></p>
                <p>Peso volumétrico: <strong>${pesoVolumetrico.toFixed(2)} kg</strong></p>
                <p>Peso para cobro: <strong>${pesoFinal.toFixed(2)} kg</strong></p>
                <p>Valor comercial: <strong>${valor.toLocaleString('es-CO', { style: 'currency', currency: 'COP' })}</strong></p>
                <p class="quote-result">Costo estimado del envío: <strong>${costoFormateado}</strong></p>
                ${rutaInvertida ? '<p class="note">Nota: Se ha calculado basado en la ruta inversa.</p>' : ''}
            `;
            
            // Estilos adicionales para el resultado
            const quoteResult = quotationDiv.querySelector('.quote-result');
            if (quoteResult) {
                quoteResult.style.fontSize = '1.1em';
                quoteResult.style.fontWeight = 'bold';
                quoteResult.style.color = '#2c3e50';
                quoteResult.style.marginTop = '10px';
            }

            // Mostrar el div de cotización
            quotationDiv.style.display = 'block';

            // Agregar un campo oculto para guardar el costo en el formulario
            const hiddenCostInput = document.getElementById('shipping_cost') || document.createElement('input');
            hiddenCostInput.type = 'hidden';
            hiddenCostInput.id = 'shipping_cost';
            hiddenCostInput.name = 'shipping_cost';
            hiddenCostInput.value = costo;

            if (!document.getElementById('shipping_cost') && modalEnvioForm) {
                modalEnvioForm.appendChild(hiddenCostInput);
            }
        }
    }

    // Agregar evento al botón de cotización
    if (quoteButton) {
        quoteButton.addEventListener('click', calcularCotizacion);
    }

    // Validación del formulario antes de envío
    if (modalEnvioForm) {
        modalEnvioForm.addEventListener('submit', function (e) {
            let isValid = true;
            const requiredFields = this.querySelectorAll('[required]');

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                } else {
                    field.classList.remove('error');
                }
            });

            // Verificar si se ha calculado la cotización y el campo total tiene valor
            if (!commerciaValueInput || !commerciaValueInput.value) {
                isValid = false;
                alert('Por favor, calcule la cotización antes de crear el envío.');
            }

            if (!isValid) {
                e.preventDefault();
                alert('Por favor, complete todos los campos obligatorios.');
            }
        });
    }

    // Eventos para los botones de ver y editar
    const viewButtons = document.querySelectorAll('.btn-view');
    const editButtons = document.querySelectorAll('.btn-edit');

    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            const orderId = this.getAttribute('data-id');
            alert('Ver detalles del envío ID: ' + orderId);
        });
    });

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const orderId = this.getAttribute('data-id');
            alert('Editar envío ID: ' + orderId);
        });
    });

    // Recalcular cotización cuando cambian valores que afectan el costo
    const inputsToWatch = [weightInput, widthInput, heightInput, originSelect, destinationSelect];
    inputsToWatch.forEach(input => {
        if (input) {
            input.addEventListener('change', () => {
                // Si todos los campos necesarios tienen valor, calcular automáticamente
                if (originSelect?.value && destinationSelect?.value &&
                    weightInput?.value && widthInput?.value &&
                    heightInput?.value) {
                    calcularCotizacion();
                }
            });
        }
    });

});