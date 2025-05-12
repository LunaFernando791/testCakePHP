document.addEventListener("DOMContentLoaded", function () {
    const chatBox = document.querySelector('.chat-box');
    if (chatBox) chatBox.scrollTop = chatBox.scrollHeight;

    const selectedSymptomsContainer = document.querySelector('.selected-symptoms');
    const hiddenInput = document.getElementById('entrada-hidden');
    const submitBtn = document.getElementById('submit-btn');
    const seasonDropdown = document.getElementById('seasonDropdown');
    let selectedSymptoms = [];
    let selectedSeason = '';

    function updateHiddenInput() {
        const symptomsString = selectedSymptoms.length > 0 ? selectedSymptoms.join(', ') : '';
        const seasonString = selectedSeason ? `${selectedSeason}` : '';
        hiddenInput.value = symptomsString + (symptomsString && seasonString ? ', ' : '') + seasonString;
        submitBtn.disabled = !hiddenInput.value.trim();
        //No agregar sintomas repetidos
        if (selectedSymptoms.length > 0) {
            const uniqueSymptoms = [...new Set(selectedSymptoms)];
            selectedSymptoms = uniqueSymptoms;
        }
        // Actualizar el texto del botón de estación si hay una estación seleccionada
        if (selectedSeason) {
            seasonDropdown.textContent = `Estación: ${selectedSeason}`;
            seasonDropdown.classList.add('btn-info');
            seasonDropdown.classList.remove('btn-outline-secondary');
        } else {
            seasonDropdown.textContent = 'Seleccionar estación';
            seasonDropdown.classList.remove('btn-info');
            seasonDropdown.classList.add('btn-outline-secondary');
        }
    }

    function renderSymptomTags() {
        selectedSymptomsContainer.innerHTML = '';

        // Renderizar síntomas
        selectedSymptoms.forEach(symptom => {
            const tag = document.createElement('div');
            tag.className = 'symptom-tag';
            tag.style.border = '1px solid #ced4da';
            tag.style.padding = '3px 8px';
            tag.style.borderRadius = '16px';
            tag.style.display = 'flex';
            tag.style.alignItems = 'center';
            tag.style.gap = '5px';

            const text = document.createElement('span');
            text.textContent = symptom;
            const removeBtn = document.createElement('span');
            removeBtn.innerHTML = '&times;';
            removeBtn.style.cursor = 'pointer';
            removeBtn.style.fontWeight = 'bold';
            removeBtn.style.marginLeft = '5px';
            removeBtn.addEventListener('click', function () {
                selectedSymptoms = selectedSymptoms.filter(s => s !== symptom);
                renderSymptomTags();
                updateHiddenInput();
            });

            tag.appendChild(text);
            tag.appendChild(removeBtn);
            selectedSymptomsContainer.appendChild(tag);
        });

        // Renderizar estación si está seleccionada
        if (selectedSeason) {
            const tag = document.createElement('div');
            tag.className = 'season-tag';
            tag.style.border = '1px solid #ced4da';
            tag.style.padding = '3px 8px';
            tag.style.borderRadius = '16px';
            tag.style.display = 'flex';
            tag.style.alignItems = 'center';
            tag.style.gap = '5px';

            const text = document.createElement('span');
            text.textContent = `${selectedSeason}`;

            const removeBtn = document.createElement('span');
            removeBtn.innerHTML = '&times;';
            removeBtn.style.cursor = 'pointer';
            removeBtn.style.fontWeight = 'bold';
            removeBtn.style.marginLeft = '5px';

            removeBtn.addEventListener('click', function () {
                selectedSeason = '';
                renderSymptomTags();
                updateHiddenInput();
            });

            tag.appendChild(text);
            tag.appendChild(removeBtn);
            selectedSymptomsContainer.appendChild(tag);
        }
    }

    document.querySelectorAll('.intensity-option').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            const symptom = this.getAttribute('data-symptom');
            const intensity = this.getAttribute('data-intensity');
            const fullSymptom = `${symptom} ${intensity}`;
            if (!selectedSymptoms.includes(fullSymptom)) {
                selectedSymptoms.push(fullSymptom);
                renderSymptomTags();
                updateHiddenInput();
            }
        });
    });

    // Mejorar el manejo de eventos para las opciones de estación
    document.querySelectorAll('.season-option').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation(); // Evitar propagación del evento
            selectedSeason = this.getAttribute('data-season');
            console.log('Estación seleccionada:', selectedSeason); // Agregar para depuración
            renderSymptomTags(); // Actualizar la visualización de las etiquetas
            updateHiddenInput();
        });
    });

document.getElementById('form-chat').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const jsonData = {};
    formData.forEach((v, k) => jsonData[k] = v);

    // Mostrar animación de carga
    showLoadingAnimation();

    fetch(ajaxResponderUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrfToken
        },
        body: JSON.stringify(jsonData)
    })
    .then(res => {
        if (!res.ok) {
            throw new Error('Error en la respuesta del servidor');
        }
        return res.json();
    })
    .then(data => {
        hideLoadingAnimation();
        if (!data.success) {
            console.error(data.mensaje || "Ocurrió un error");
            return;
        }

        // Limpiar la interfaz
        document.querySelector('.selected-symptoms').innerHTML = '';
        document.getElementById('entrada-hidden').value = '';
        document.getElementById('submit-btn').disabled = true;

        // Reiniciar variables globales
        selectedSymptoms = [];
        selectedSeason = '';
        renderSymptomTags();
        updateHiddenInput();

        // Cargar mensajes actualizados
        cargarMensajes();
    })
    .catch(error => {
        hideLoadingAnimation();
        console.error('Error:', error);
    });
});
// Función para mostrar la animación de carga
function showLoadingAnimation() {
            const chatBox = document.querySelector('.chat-box');
            const loadingDiv = document.createElement('div');
            loadingDiv.className = 'loading-animation';
            loadingDiv.innerHTML = `
                <div class="loading-dot"></div>
                <div class="loading-dot"></div>
                <div class="loading-dot"></div>
            `;
            loadingDiv.id = 'loading-animation';
            chatBox.appendChild(loadingDiv);
            chatBox.scrollTop = chatBox.scrollHeight;
        }
 // Función para ocultar la animación de carga
 function hideLoadingAnimation() {
            const loadingDiv = document.getElementById('loading-animation');
            if (loadingDiv) {
                loadingDiv.remove();
            }
        }
    // Capturar el envío del formulario
    const chatForm = document.getElementById('form-chat');
    if (chatForm) {
        chatForm.addEventListener('submit', function(e) {
            // Mostrar animación de carga cuando se envía el mensaje
            showLoadingAnimation();
            // Aquí puedes agregar código para enviar el formulario mediante AJAX si lo deseas
            // Si usas el envío normal del formulario, la animación desaparecerá cuando se recargue la página
        });
    }

function cargarMensajes() {
    fetch(cargarMensajesUrl)
        .then(res => res.text())
        .then(html => {
            document.querySelector('.chat-box').innerHTML = html;
            const box = document.querySelector('.chat-box');
            box.scrollTop = box.scrollHeight;
        });
}
document.querySelectorAll(".dropdown-submenu").forEach(submenu => {
    submenu.addEventListener("mouseenter", () => {
        const subMenu = submenu.querySelector(".dropdown-menu");
        if (subMenu) subMenu.style.display = "block";
    });

    submenu.addEventListener("mouseleave", () => {
        const subMenu = submenu.querySelector(".dropdown-menu");
        if (subMenu) subMenu.style.display = "none";
    });
});
cargarMensajes();
document.getElementById('form-specialist').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const jsonData = {};

    // Capturar el botón presionado
    const clickedButton = document.activeElement;

    // Obtener el valor de la respuesta ("si" o "no")
    const respuesta = clickedButton.value;

    // Mostrar animación de carga
    showLoadingAnimation();

    fetch(mostrarEspecialistaUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrfToken
        },
        body: JSON.stringify(jsonData)
    })
    .then(res => {
        if (!res.ok) {
            throw new Error('Error en la respuesta del servidor');
        }
        return res.json();
    })
    .then(data => {
        if (!data.success) {
            alert(data.mensaje || "Ocurrió un error");
        }
        // Cargar los mensajes actualizados
        cargarMensajes();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ocurrió un error al comunicarse con el servidor');
    })
    .finally(() => {
        // Ocultar animación de carga
        hideLoadingAnimation();
    });
});
});






/*document.getElementById('form-chat').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const jsonData = {};
    formData.forEach((v, k) => jsonData[k] = v);
    fetch(ajaxResponderUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrfToken
        },
        body: JSON.stringify(jsonData)
    })
    .then(res => res.json())
    .then(data => {
        if (!data.success)
            alert(data.mensaje || "Ocurrió un error");
        else{
            // Limpiar los síntomas seleccionados
            document.querySelector('.selected-symptoms').innerHTML = null;
            // Limpiar el campo oculto
            document.getElementById('entrada-hidden').value = null;
            // Deshabilitar el botón de enviar
            document.getElementById('submit-btn').disabled = true;
            // Limpiar el campo oculto
            document.getElementById('entrada-hidden').value = null
            // Si tienes una variable global selectedSymptoms, reiniciarla
            if (typeof selectedSymptoms !== 'undefined') {
                selectedSymptoms = [];
                selectedSeason = ''; // Opcional: reiniciar la estación si la tienes en la variable global
                renderSymptomTags();
                updateHiddenInput();
            }
            cargarMensajes();
        }
    });

});*/
