<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">TestProject</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php
            if($this->request->getSession()->read('Auth.User')){
                echo '<li class="nav-item">';
                echo $this->Html->link(__('Home'), ['controller' => 'Panel', 'action' => 'index'], ['class' => 'nav-link active']);
                echo '</li>';
                echo '<li class="nav-item">';
                echo $this->Html->link(__('Proyectos'), ['controller' => 'Proyectos', 'action' => 'index'], ['class' => 'nav-link active']);
                echo '</li>';
                };
            ?>
            <?php
            if(!$this->request->getSession()->read('Auth.User')){
                echo '<li class="nav-item">';
                echo $this->Html->link(__('Home'), ['controller' => 'Panel', 'action' => 'index'], ['class' => 'nav-link active']);
                echo '</li>';
                echo '<li class="nav-item">';
                echo $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link active']);
                echo '</li>';
                echo '<li class="nav-item">';
                echo $this->Html->link(__('Register'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link active']);
            }
           ?>
        </ul>
        <?php if ($this->request->getSession()->read('Auth.User')): ?>
            <?= $this->Html->link(__('Cerrar Sesion'), ['controller' => 'Users', 'action' => 'logout'], ['class' => 'btn btn-danger'])?>
        <?php endif;?>
        </div>
        </div>
    </nav>