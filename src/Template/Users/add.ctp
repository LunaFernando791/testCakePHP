<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control(__('username'), ['type' => 'text','required' => true,'placeholder' => 'Username', 'label' => 'Username', 'autofocus' => true, 'autocomplete' => 'username', 'class' => 'form-control']);
            echo $this->Form->control(__('email'), ['type' => 'email', 'required' => true,'placeholder' => 'Email', 'label' => 'Email', 'autofocus' => true, 'autocomplete' => 'email', 'class' => 'form-control']);
            echo $this->Form->control(__('password'), ['type' => 'password','required' => true,'placeholder' => 'Password', 'label' => 'Password', 'class' => 'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
