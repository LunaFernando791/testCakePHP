<h2>
	<?php echo $title; ?>
</h2>

<?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout', ], ['class' => 'btn btn-danger']); ?>