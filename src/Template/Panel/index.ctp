

<div class="container m-4 p-3 border rounded bg-secondary bg-opacity-10">
	<div class="d-flex align-items-center h-100">
		<h2><?php echo $title . "&nbsp;" ; ?></h2>
		<h2><?= " ". $authUser['nombre'];?></h2>
	</div>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						<h4>Ultimos proyectos</h4>
					</div>
					<div class="card-body">
						<ul>
							<?php foreach ($recentProjects as $project):?>
							<li>
								<?php echo $this->Html->link($project->nombre, ['controller' => 'Proyectos', 'action' => 'view', $project->id]);?>
							</li>
							<?php endforeach;?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						<h4>Ultimas tareas</h4>
					</div>
					<div class="card-body">
						<ul>
							<?php foreach ($recentTasks as $task):?>
							<li>
								<?php echo $this->Html->link($task->nombre, ['controller' => 'Tareas', 'action' => 'view', $task->id]);?>
							</li>
							<?php endforeach;?>
						</ul>
					</div>		
				</div>
			</div>
	</div>
</div>