<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<h3><?= __('Add Category')?></h3>
<?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-primary'])?>
<?= $this->Form->create($category) ?>
<?= $this->Form->control('name', ['class' => 'form-control'])?>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary mb-3']) ?>
<?= $this->Form->end()?>
