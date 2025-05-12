<?php if (!empty($chats) && $chats->count() > 0):?>
    <?php foreach ($chats as $chat): ?>
        <?php if ($chat->entrada != "a"):?>
        <div class="message user-message m-3">
            <div class="d-flex justify-content-end">
                <div class="bg-primary text-white p-3 rounded-3">
                    <strong><?= $this->request->getSession()->read('Auth.User.nombre')?>:</strong> <?= h(($chat->entrada)) ?>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="message bot-message mb-3">
            <div class="d-flex justify-content-start">
                <div class="border
                 p-3 rounded-3">
                    <strong>BrainMed:</strong> <?=nl2br( h($chat->respuesta)) ?>
                </div>
            </div>
            <br>
    <?php endforeach; ?>
    <?php if ($this->request->getSession()->read('Diagnostico.mostrarEspecialista')): ?>
        <div class="d-flex justify-content-start">
            <div class="border
                 p-3 rounded-3">
                    <strong>BrainMed:</strong> ¿Deseas saber a qué médico acudir?
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
                <div class="bg-primary text-white p-3 rounded-3">
                    <?= $this->Form->create(null, [
                        'url'=> ['action' => 'mostrarEspecialista'],
                        'id' => 'form-specialist'
                    ])?>
                        <?= $this->Form->button('Sí', ['name' => 'respuesta','value' => 'si' ,'type' => 'submit', 'class' => 'btn btn-primary'])?>
                        <?= $this->Form->button('No', ['name' => 'respuesta','value' => 'no', 'type' =>'submit', 'class' => 'btn btn-secondary'])?>
                    <?= $this->Form->end()?>
                    <?php $this->request->getSession()->write('Diagnostico.mostrarEspecialista', false);?>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php else: ?>
        <div class="message bot-message mb-3">
            <div class="d-flex justify-content-start">
                <div class="border p-3 rounded-3">
                    <strong>BrainMed:</strong> Hola, ¿en qué puedo ayudarte?
                </div>
            </div>
        </div>
<?php endif; ?>


