
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Login</h2>
                </div>
                <div class="card-body">
                    <?= $this->Form->create()?>
                    <?= $this->Form->control('email', ['required' => true,'placeholder' => 'Email', 'label' => 'Email', 'class' => 'form-control'])?>
                    <br>
                    <?= $this->Form->control('password', ['type' => 'password','autocomplete' => 'off','required' => true,'placeholder' => 'Password', 'label' => 'Password', 'class' => 'form-control'])?>
                </div>
                <br>
                <div class="text-center">
                <?= $this->Form->button(__('Login'),['class'=>'btn btn-primary']);?>
                <br>
                </div>
                <?= $this->Form->end()?>
                <br>
            </div>
        </div>
    </div>
</div>

