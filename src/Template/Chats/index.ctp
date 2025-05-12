<body>
    <div class="container">
        <div class="card m-3">
            <div class="card-body m-3">
                <!-- Chat box -->
                <div class="chat-box m-3 overflow-y-auto" style="height: 500px;"></div>
                <?= $this->Form->create(null, ['url' => ['action' => 'index'], 'class' => 'd-flex flex-column', 'id' => 'form-chat']) ?>
                <div class="selected-symptoms mb-2" style="min-height: 40px; border: 1px solid #ced4da; border-radius: 0.50rem; padding: 5px; display: flex; flex-wrap: wrap; gap: 5px;">
                    Ingresa tus síntomas aquí:
                </div>
                <div class="input-group">
                    <input type="hidden" name="entrada" id="entrada-hidden" required>
                    <!-- Syntoms selection dropdown -->
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
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="tos" data-intensity="baja">Seca</a></li>
                                    <li><a class="dropdown-item intensity-option" href="#" data-symptom="tos" data-intensity="media">Flemas
                                    </a></li>
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
                    <!-- Season dropdown -->
                    <div class="dropdown ms-2">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="seasonDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Seleccionar estación
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="seasonDropdown">
                            <li><a class="dropdown-item season-option" href="#" data-season="invierno">Invierno</a></li>
                            <li><a class="dropdown-item season-option" href="#" data-season="otonio">Otoño</a></li>
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
    <script>
        // Get the CSRF token and the URL for the AJAX response.
        const csrfToken = <?= json_encode($this->request->getAttribute('csrfToken')) ?>;
        const ajaxResponderUrl = <?= json_encode($this->Url->build(["controller" => "Chats", "action" => "ajaxResponder"])) ?>;
        const cargarMensajesUrl ='<?= $this->Url->build(["controller" => "Chats", "action" => "obtenerMensajes"]) ?>';
        const mostrarEspecialistaUrl = '<?= $this->Url->build([ 'controller' => 'Chats', 'action' => 'mostrarEspecialista'])?>';
    </script>
    <?= $this->Html->script('chatForm') ?> <!-- Get the JS document to import and send the form. -->
</body>



