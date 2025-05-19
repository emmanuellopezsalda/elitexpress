document.addEventListener('DOMContentLoaded', function() {
    const envioModal = document.getElementById('envioModal');
    const modalEnvioForm = document.getElementById('modalEnvioForm');
    const closeModal = document.querySelector(".close-modal");
    const addEnvioButton = document.querySelector(".btn-crear");
    const form = document.querySelector(".form");

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

    const alertMessage = document.querySelector('.alert');
    if (alertMessage) {
        setTimeout(() => {
            alertMessage.remove();
        }, 5000);
    }

    if (modalEnvioForm) {
        modalEnvioForm.addEventListener('submit', function(e) {
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
            
            if (!isValid) {
                e.preventDefault();
                alert('Por favor, complete todos los campos obligatorios.');
            }
        });
    }

    const viewButtons = document.querySelectorAll('.btn-view');
    const editButtons = document.querySelectorAll('.btn-edit');

    viewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.getAttribute('data-id');
            alert('Ver detalles del envío ID: ' + orderId);
        });
    });

    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.getAttribute('data-id');
            alert('Editar envío ID: ' + orderId);
        });
    });
});