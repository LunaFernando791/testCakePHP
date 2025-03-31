<?= $this->Form->create()?>
<?= $this->Form->control('username', ['required' => true,'placeholder' => 'Username', 'label' => 'Username', 'class' => 'form-control'])?>
<?= $this->Form->control('password', ['class' => 'form-control'])?>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']);?>
<?= $this->Form->end()?>


