<div class="container-fluid
">
	<div class="row">
		<h1><?= $title ?></h1>
	</div>
	<div class="row">
		<div class="col">
			<div class = "card h-100">
				<div class="card-header">
					<h2>Bienvenido <?=$userData['nombre']
					?></h1>
					
				</div>
				<div class="card-body">
					<p>Checa tus ultimos proyectos pendientes y tareas!</p>
				</div>
			</div>
		</div>
		<div class="col">
			<div class = "card h-100">
				<div class="card-header">
					<h2>Ultimos proyectos</h2>
				</div>
				<div class="card-body">
					<p> Estos son tus ultimos proyectos:</p>
					<?php if ($recentProjects->isEmpty(
					)): ?>
						<p>No hay proyectos recientes.</p>
					<?php else: ?>
						<ul>
							<?php foreach ($recentProjects as $project): ?>
								<li><a href="<?= $this->Url->build(['controller' => 'Proyectos', 'action' => 'view', $project['id']])?>"><?= $project['nombre']?></a></li>
							<?php endforeach; ?>
						</ul>
						
					<?php endif;?>
				</div>
			</div>
		</div>
		<div class="col">
			<div class = "card h-100">
				<div class="card-header">
					<h2>Ultimas tareas</h2>
				</div>
				<div class="card-body">
					<p>Estas son tus ultimas tareas:</p>
					<?php if (!$recentTasks->isEmpty()):?>
						<ul>
							<?php foreach ($recentTasks as $task):?>
								<li><a href="<?= $this->Url->build(['controller' => 'Tareas', 'action' => 'view', $task['id']])?>"><?= $task['nombre']?></a></li>
							<?php endforeach;?>
						</ul>
					<?php else:?>
						<p>No hay tareas recientes.</p>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col">
			<div class = "card">
				<div class="card-header">
					<h2>My Skills</h2>
				</div>
				<div class="card-body">
					<p>Here are some of the skills I have:</p>
					<ul>
						<li>HTML</li>
						<li>CSS</li>
						<li>JavaScript</li>
					</ul>
				</div>
			</div>
		</div>
	</div>	
</div>
