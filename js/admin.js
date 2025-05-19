document.addEventListener('DOMContentLoaded', () => {
    const enviosSection = document.getElementById('enviosSection');
    const usuariosSection = document.getElementById('usuariosSection');
    const vendedoresSection = document.getElementById('vendedoresSection');
    const menuEnvios = document.getElementById('menuEnvios');
    const menuUsuarios = document.getElementById('menuUsuarios');
    const menuVendedores = document.getElementById('menuVendedores');
    
    const allModals = document.querySelectorAll('.modal');
    
    allModals.forEach(modal => {
        modal.classList.remove('active');
    });

    menuEnvios.addEventListener('click', () => {
        enviosSection.style.display = 'block';
        vendedoresSection.style.display = 'none';
        usuariosSection.style.display = "none";
        menuEnvios.classList.add('active');
        menuVendedores.classList.remove('active');
        menuUsuarios.classList.remove('active');
    });
    
    menuUsuarios.addEventListener('click', () => {
        enviosSection.style.display = 'none';
        vendedoresSection.style.display = 'none';
        usuariosSection.style.display = "block";
        menuUsuarios.classList.add('active');
        menuVendedores.classList.remove('active');
        menuEnvios.classList.remove('active');
    });
    
    menuVendedores.addEventListener('click', () => {
        enviosSection.style.display = 'none';
        vendedoresSection.style.display = 'block';
        usuariosSection.style.display = "none";
        menuEnvios.classList.remove('active');
        menuVendedores.classList.add('active');
        menuUsuarios.classList.remove('active');
    });

    menuEnvios.classList.add('active');

    const filterBtn = document.getElementById('filterBtn');
    if (filterBtn) {
        filterBtn.addEventListener('click', () => {
            const filterOrigen = document.getElementById('filterOrigen').value;
            const filterDestino = document.getElementById('filterDestino').value;
            const table = document.getElementById('enviosTable');

            if (table) {
                const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

                for (let i = 0; i < rows.length; i++) {
                    const origenCell = rows[i].getElementsByTagName('td')[3];
                    const destinoCell = rows[i].getElementsByTagName('td')[4];

                    let showRow = true;

                    if (filterOrigen && origenCell.textContent.trim() !== filterOrigen) {
                        showRow = false;
                    }

                    if (filterDestino && destinoCell.textContent.trim() !== filterDestino) {
                        showRow = false;
                    }

                    rows[i].style.display = showRow ? '' : 'none';
                }
            }
        });
    }

    const allieModal = document.getElementById('allieModal');
    const modalAllieForm = document.getElementById('modalAllieForm');
    const addAllieButton = document.querySelector(".btn-crear");
    addAllieButton.addEventListener('click', () => {
        if (allieModal) {
            allieModal.classList.add('active');
        }
    });

    const closeModal = document.querySelectorAll('.close-modal');
    const forms = document.querySelectorAll(".form");
    
    closeModal.forEach(btn => {
        btn.addEventListener('click', () => {
            allModals.forEach(modal => {
                modal.classList.remove('active');
            });
            forms.forEach(form => {
                form.reset();
            });
        });
    });

    window.addEventListener('click', (event) => {
        if (event.target.classList.contains('modal')) {
            event.target.classList.remove('active');
            
            if (event.target === allieModal && modalAllieForm) {
                modalAllieForm.reset();
            }
            
            if (event.target === editAllieModal && modalEditUserForm) {
                modalEditUserForm.reset();
            }
        }
    });

    if (modalAllieForm) {
        modalAllieForm.setAttribute('action', '../process/create_ally.php');
        modalAllieForm.setAttribute('method', 'POST');

        document.getElementById('modalName').setAttribute('name', 'name');
        document.getElementById('modalEmail').setAttribute('name', 'email');
        document.getElementById('modalPassword').setAttribute('name', 'password');
        document.getElementById('modalAddress').setAttribute('name', 'address');
        document.getElementById('modalNit').setAttribute('name', 'nit');
        document.getElementById('modalContact').setAttribute('name', 'contact');
    }

    const editAllieModal = document.getElementById('editAllieModal');
    const modalEditUserForm = document.getElementById('modalEditAllieForm');
    let currentEditId = null;

    const addEditButtonsToAllies = () => {
        const alliesTable = vendedoresSection.querySelector('table');
        if (alliesTable) {
            const rows = alliesTable.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const id = row.getElementsByTagName('td')[0].textContent;

                if (!row.querySelector('.btn-edit')) {
                    const actionsCell = document.createElement('td');

                    const editButton = document.createElement('button');
                    editButton.textContent = 'Editar';
                    editButton.classList.add('btn-edit');
                    editButton.dataset.id = id;

                    editButton.addEventListener('click', () => {
                        openEditModal(id, row);
                    });

                    actionsCell.appendChild(editButton);
                    row.appendChild(actionsCell);
                }
            }

            const headerRow = alliesTable.getElementsByTagName('thead')[0].getElementsByTagName('tr')[0];
            if (headerRow.getElementsByTagName('th').length < 7) {
                const actionsHeader = document.createElement('th');
                actionsHeader.textContent = 'Acciones';
                headerRow.appendChild(actionsHeader);
            }
        }
    };

    menuVendedores.addEventListener('click', addEditButtonsToAllies);

    const openEditModal = (id, row) => {
        const cells = row.getElementsByTagName('td');

        document.getElementById('modalEditName').value = cells[1].textContent;
        document.getElementById('modalEditEmail').value = cells[2].textContent;
        document.getElementById('modalEditPassword').value = '';
        document.getElementById('modalEditAddress').value = cells[4].textContent;
        document.getElementById('modalEditNit').value = cells[3].textContent;
        document.getElementById('modalEditContact').value = cells[5].textContent;

        let idField = document.getElementById('modalEditId');
        if (!idField) {
            idField = document.createElement('input');
            idField.type = 'hidden';
            idField.id = 'modalEditId';
            idField.name = 'id';
            modalEditUserForm.appendChild(idField);
        }
        idField.value = id;

        editAllieModal.classList.add('active');
    };

    const closeEditModal = document.querySelector('.close-modal-edit');
    if (closeEditModal && editAllieModal) {
        closeEditModal.addEventListener('click', () => {
            editAllieModal.classList.remove('active');
            if (modalEditUserForm) modalEditUserForm.reset();
        });
    }

    if (modalEditUserForm) {
        modalEditUserForm.setAttribute('action', '../process/update_ally.php');
        modalEditUserForm.setAttribute('method', 'POST');

        document.getElementById('modalEditName').setAttribute('name', 'name');
        document.getElementById('modalEditEmail').setAttribute('name', 'email');
        document.getElementById('modalEditPassword').setAttribute('name', 'password');
        document.getElementById('modalEditAddress').setAttribute('name', 'address');
        document.getElementById('modalEditNit').setAttribute('name', 'nit');
        document.getElementById('modalEditContact').setAttribute('name', 'contact');
    }

    const viewButtons = document.querySelectorAll('.btn-view');
    const editButtons = document.querySelectorAll('.btn-edit');

    viewButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            window.location.href = `../pages/view_order.php?id=${id}`;
        });
    });

    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            window.location.href = `../pages/edit_order.php?id=${id}`;
        });
    });

    const mainElements = document.querySelectorAll('.main-content section');
    mainElements.forEach(element => {
        element.classList.add('fade-in');
    });
});