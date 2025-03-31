<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category[]|\Cake\Collection\CollectionInterface $categories
 */
?>

<?php
$this->assign('title', __('Categories'));?>
<h2 class=""><?= __('Categories')?></h2>
<?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
<table class="table">
    <thead >
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category):?>
        <tr>
            <td><?= $this->Number->format($category->id) ?></td>
            <td><?= h($category->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $category->id],['class'=> 'btn btn-info']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id],['class' => 'btn btn-warning'])?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id), 'class' => 'btn btn-danger'])?>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<div>
    <ul class="pagination">
        <?= $this->Paginator->first('« Primero', ['class' => 'page-link']) ?>
        <?= $this->Paginator->prev('<' . __('Anterior'), ['class' => 'page-link'])?>
        <?= $this->Paginator->numbers([
            'class' => 'page-link',
        ])?>
        <?= $this->Paginator->next('Siguiente ›', ['class' => 'page-link']) ?>
        <?= $this->Paginator->last(__('Último') . ' >>', ['class' => 'page-link'])?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'))?></p>
</div>

