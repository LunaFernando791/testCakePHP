<h2>
	<?php echo $title; ?>
</h2>

<h3>Welcome <?= $authUser['username'];?></h3>
<?= $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout', ], ['class' => 'btn btn-danger']); ?>