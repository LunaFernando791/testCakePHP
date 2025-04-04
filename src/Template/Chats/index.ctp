
<body>
    <div class="container mt-5">
        <h2 class="text-center">Chat Interactivo</h2>
        <div class="card">
            <div class="card-body">
                <!-- En la sección de chat-box -->
                <div class="chat-box mb-3" style="max-height: 400px; overflow-y: auto;">
                    <!-- Mostrar mensajes anteriores -->
                    <?php if (!empty($chats)): ?>
                        <?php foreach ($chats as $chat): ?>
                            <div class="message user-message mb-3">
                                <div class="d-flex justify-content-end">
                                    <div class="bg-primary text-white p-3 rounded-3">
                                        <strong>Usuario:</strong> <?= h($chat->entrada) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="message bot-message mb-3">
                                <div class="d-flex justify-content-start">
                                    <div class="bg-light p-3 rounded-3">
                                        <strong>BrainMed:</strong> <?= h($chat->respuesta) ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- Mostrar el mensaje actual si existe -->
                    <?php if (isset($entrada) && isset($respuesta)): ?>
                        <div class="message user-message mb-3">
                            <div class="d-flex justify-content-end">
                                <div class="bg-primary text-white p-3 rounded-3">
                                    <strong>Usuario:</strong> <?= h($entrada) ?>
                                </div>
                            </div>
                        </div>
                        <div class="message bot-message mb-3">
                            <div class="d-flex justify-content-start">
                                <div class="bg-light p-3 rounded-3">
                                    <strong>BrainMed:</strong> <?= h($respuesta) ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <?= $this->Form->create(null, ['url' => ['action' => 'index'], 'class' => 'd-flex']) ?>
                    <div class="input-group">
                        <?= $this->Form->control('entrada', [
                            'label' => false, 
                            'placeholder' => 'Escribe tu mensaje...', 
                            'required' => true, 
                            'class' => 'form-control'
                        ]) ?>
                        <button type="submit" class="btn btn-primary ms-2">Enviar</button>
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
    });
</script>
</html>



