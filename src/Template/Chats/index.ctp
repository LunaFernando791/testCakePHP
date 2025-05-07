<body>
    <div class="container w-100">
        <div class="card">
            <div class="card-body">
                <!-- En la sección de chat-box -->
                <div class="chat-box mb-3" style="max-height: 450px; overflow-y: auto;"></div>
                <?= $this->Form->create(null, ['url' => ['action' => 'index'], 'class' => 'd-flex flex-column', 'id' => 'form-chat']) ?>
                <div class="selected-symptoms mb-2" style="min-height: 40px; border: 1px solid #ced4da; border-radius: 0.50rem; padding: 5px; display: flex; flex-wrap: wrap; gap: 5px;"></div>
                <div class="input-group">
                    <input type="hidden" name="entrada" id="entrada-hidden" required>
                    <!-- Menú de síntomas con intensidades -->
                    <div class="dropdown ms-2">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="symptomDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Seleccionar síntomas
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="symptomDropdown">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Fiebre</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="fiebre" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="fiebre" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="fiebre" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Tos</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="tos" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="tos" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="tos" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Dolor de cabeza</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_de_cabeza" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_de_cabeza" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_de_cabeza" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Dolor muscular</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_muscular" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_muscular" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_muscular" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Dolor de garganta</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_de_garganta" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_de_garganta" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_de_garganta" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Estornudos</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="estornudos" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="estornudos" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="estornudos" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Náuseas</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="nauseas" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="nauseas" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="nauseas" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Congestión nasal</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="congestion_nasal" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="congestion_nasal" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="congestion_nasal" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Apatía</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="apatia" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="apatia" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="apatia" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Comezón</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="comezon" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="comezon" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="comezon" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Diarrea</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="diarrea" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="diarrea" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="diarrea" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Dificultad respiratoria</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dificultad_respiratoria" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dificultad_respiratoria" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dificultad_respiratoria" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Dolor abdominal</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_abdominal" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_abdominal" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_abdominal" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Dolor de ojos</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_de_ojos" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_de_ojos" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_de_ojos" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Dolor en pecho</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_en_pecho" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_en_pecho" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_en_pecho" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Dolor facial</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_facial" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_facial" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="dolor_facial" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Enrojecimiento</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="enrojecimiento" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="enrojecimiento" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="enrojecimiento" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Erupción cutánea</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="erupcion_cutanea" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="erupcion_cutanea" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="erupcion_cutanea" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Escalofríos</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="escalofrios" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="escalofrios" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="escalofrios" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Fatiga</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="fatiga" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="fatiga" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="fatiga" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Falta de concentración</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="falta_de_concentracion" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="falta_de_concentracion" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="falta_de_concentracion" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Fotosensibilidad</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="fotosensibilidad" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="fotosensibilidad" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="fotosensibilidad" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Lagrimeo</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="lagrimeo" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="lagrimeo" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="lagrimeo" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Malestar</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="malestar" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="malestar" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="malestar" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Malestar general</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="malestar_general" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="malestar_general" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="malestar_general" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Mialgias</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="mialgias" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="mialgias" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="mialgias" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Ojos llorosos</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="ojos_llorosos" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="ojos_llorosos" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="ojos_llorosos" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Pérdida de apetito</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="perdida_apetito" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="perdida_apetito" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="perdida_apetito" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Pérdida del olfato</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="perdida_del_olfato" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="perdida_del_olfato" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="perdida_del_olfato" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Secreción</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="secrecion" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="secrecion" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="secrecion" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Somnolencia</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="somnolencia" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="somnolencia" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="somnolencia" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Sudoración</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="sudoracion" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="sudoracion" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="sudoracion" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Vómito</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="vomito" data-intensity="baja">Baja</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="vomito" data-intensity="media">Media</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="vomito" data-intensity="alta">Alta</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Hemorragia</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="hemorragia" data-intensity="baja">Baja</a></li>
                                </ul>
                            </li>
                            <!-- Agrega más síntomas aquí si lo deseas -->
                        </ul>
                    </div>
                    <!-- Menú de estaciones -->
                    <div class="dropdown ms-2">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="seasonDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Seleccionar estación
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="seasonDropdown">
                            <li><a class="dropdown-item season-option" href="#" data-season="invierno">Invierno</a></li>
                            <li><a class="dropdown-item season-option" href="#" data-season="otoño">Otoño</a></li>
                            <li><a class="dropdown-item season-option" href="#" data-season="primavera">Primavera</a></li>
                            <li><a class="dropdown-item season-option" href="#" data-season="verano">Verano</a></li>
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-primary ms-2" id="submit-btn" disabled>Enviar</button>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
<style>
    ul,ol{
        list-style: none;
    }
    .dropdown-menu{
        max-width: 400px;
    overflow-y: auto;
    max-height: 300px;
    }
    .dropdown-menu li a{
        width: 200px;
        display: block;
        color: #fff;
        text-decoration: none;
        font-weight: 400;
        font-size: 15px;
        padding: 10px;
        transition: all 500ms ease;
        border-radius: 5px;
        
    }
    .dropdown-menu li a:hover{
        background:rgba(48, 48, 48, 0.68);
        color: #007bff;
        transition: all 500ms ease;
    }
    .dropdown-menu > li{
        float: left;
    }
    .dropdown-menu  li  ul{
        display: none;
        position: absolute;
        min-width: 140px;

    }
    .dropdown-menu  li:hover > ul{
        display: block;
    }

    /* Animación de carga */
    .loading-animation {
        display: flex;
        justify-content: center;
        margin: 10px 0;
    }
    .loading-dot {
        width: 8px;
        height: 8px;
        margin: 0 3px;
        border-radius: 50%;
        background-color: #007bff;
        animation: bounce 1.4s infinite ease-in-out both;
    }
    
    .loading-dot:nth-child(1) {
        animation-delay: -0.32s;
    }
    
    .loading-dot:nth-child(2) {
        animation-delay: -0.16s;
    }
    
    @keyframes bounce {
        0%, 80%, 100% {
            transform: scale(0);
        }
        40% {
            transform: scale(1);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
        
        // Función para añadir la clase de animación a los nuevos mensajes
        function animateNewMessage(messageElement) {
            messageElement.classList.add('message-new');
            // Eliminar la clase después de que termine la animación para evitar problemas con futuras animaciones
            setTimeout(() => {
                messageElement.classList.remove('message-new');
            }, 500);
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
        // Si tienes mensajes que se cargan al iniciar la página, puedes animarlos así:
        document.querySelectorAll('.chat-box .message').forEach(function(message) {
            animateNewMessage(message);
        });
    });
</script>
</body>
<style>
.dropdown-submenu {
    position: relative;
}
.dropdown-submenu > .dropdown-menu {
    top: 0;
    left: 100%;
    margin-left: 0.1rem;
    margin-right: 0.1rem;
    display: none;
    position: absolute;
    
}
.dropdown-submenu:hover > .dropdown-menu {
    display: block;
}
</style>

<script>
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
    fetch('<?= $this->Url->build(["controller" => "Chats", "action" => "ajaxResponder"]) ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': document.querySelector('meta[name="csrfToken"]').getAttribute('content')
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
    
});

function cargarMensajes() {
    fetch('<?= $this->Url->build(["controller" => "Chats", "action" => "obtenerMensajes"]) ?>')
        .then(res => res.text())
        .then(html => {
            document.querySelector('.chat-box').innerHTML = html;
            const box = document.querySelector('.chat-box');
            box.scrollTop = box.scrollHeight;
        });
}
// Opcional: recarga periódica automática
setInterval(cargarMensajes, 5000); // cada 5 segundos
});
</script>
</html>



