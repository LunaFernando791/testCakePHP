<?php if (!empty($chats) && $chats->count() > 0):?>
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
                <div class="border p-3 rounded-3">
                    <strong>BrainMed:</strong> Hola, ¿en qué puedo ayudarte?
                </div>
            </div>
        </div>
<?php endif; ?>
                
