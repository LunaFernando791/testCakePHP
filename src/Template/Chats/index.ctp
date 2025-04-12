
<body>
    <div class="container w-100">
        <h2 class="text-center">BrainMed</h2>
        <div class="card">
            <div class="card-body">
                <!-- En la sección de chat-box -->
                <div class="chat-box mb-3" style="max-height: 350px; overflow-y: auto;">
                    <!-- Mostrar mensajes anteriores -->
                    <?php if (!empty($chats) && $chats->count() > 0): ?>
                        <?php foreach ($chats as $chat): ?>
                            <div class="message user-message m-3">
                                <div class="d-flex justify-content-end">
                                    <div class="bg-primary text-white p-3 rounded-3">
                                        <strong><?= $this->request->getSession()->read('Auth.User.nombre')?>:</strong> <?= h($chat->entrada) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="message bot-message mb-3">
                                <div class="d-flex justify-content-start">
                                    <div class="border
                                     p-3 rounded-3">
                                        <strong>BrainMed:</strong> <?= h($chat->respuesta) ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                            <div class="message bot-message mb-3">
                                <div class="d-flex justify-content-start">
                                    <div class="bg-light p-3 rounded-3">
                                        <strong>BrainMed:</strong> Hola, ¿en qué puedo ayudarte?
                                    </div>
                                </div>
                            </div>
                    <?php endif; ?>
                </div>

                <?= $this->Form->create(null, ['url' => ['action' => 'index'], 'class' => 'd-flex flex-column']) ?>
                    <div class="selected-symptoms mb-2" style="min-height: 40px; border: 1px solid #ced4da; border-radius: 0.25rem; padding: 5px; display: flex; flex-wrap: wrap; gap: 5px;"></div>
                    <div class="input-group">
                        <input type="hidden" name="entrada" id="entrada-hidden" required>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="symptomDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Seleccionar síntomas
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="symptomDropdown">
                                <li><a class="dropdown-item" href="#" data-symptom="fiebre">Fiebre</a></li>
                                <li><a class="dropdown-item" href="#" data-symptom="tos">Tos</a></li>
                                <li><a class="dropdown-item" href="#" data-symptom="dolor de cabeza">Dolor de cabeza</a></li>
                                <li><a class="dropdown-item" href="#" data-symptom="congestion nasal">Congestión nasal</a></li>
                                <li><a class="dropdown-item" href="#" data-symptom="dolor muscular">Dolor muscular</a></li>
                                <li><a class="dropdown-item" href="#" data-symptom="dolor de garganta">Dolor de garganta</a></li>
                                <li><a class="dropdown-item" href="#" data-symptom="fatiga">Fatiga</a></li>
                                <li><a class="dropdown-item" href="#" data-symptom="dificultad para respirar">Dificultad para respirar</a></li>
                            </ul>
                        </div>
                        <button type="submit" class="btn btn-primary ms-2" id="submit-btn" disabled>Enviar</button>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js') ?>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const chatBox = document.querySelector('.chat-box');
        chatBox.scrollTop = chatBox.scrollHeight;

        // Sistema de selección de síntomas
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        const selectedSymptomsContainer = document.querySelector('.selected-symptoms');
        const hiddenInput = document.getElementById('entrada-hidden');
        const submitBtn = document.getElementById('submit-btn');

        let selectedSymptoms = [];

        // Función para actualizar el input oculto y el botón de envío
        function updateHiddenInput() {
            hiddenInput.value = selectedSymptoms.length > 0 ?
                selectedSymptoms.join(', ') : '';

            // Habilitar/deshabilitar botón de envío
            submitBtn.disabled = selectedSymptoms.length === 0;
        }

        // Función para renderizar las etiquetas de síntomas
        function renderSymptomTags() {
            selectedSymptomsContainer.innerHTML = '';

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

                removeBtn.addEventListener('click', function() {
                    selectedSymptoms = selectedSymptoms.filter(s => s !== symptom);
                    renderSymptomTags();
                    updateHiddenInput();
                });

                tag.appendChild(text);
                tag.appendChild(removeBtn);
                selectedSymptomsContainer.appendChild(tag);
            });
        }

        // Agregar event listeners a los elementos del dropdown
        dropdownItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const symptom = this.getAttribute('data-symptom');

                // Evitar duplicados
                if (!selectedSymptoms.includes(symptom)) {
                    selectedSymptoms.push(symptom);
                    renderSymptomTags();
                    updateHiddenInput();
                }
            });
        });
    });
</script>
</html>



