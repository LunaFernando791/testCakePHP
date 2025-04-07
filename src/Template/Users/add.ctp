<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Register User</h2>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($user)?>
                        <?= $this->Form->control('nombre', [
                            'type' => 'text',
                            'required' => true,
                            'placeholder' => 'Nombre', 
                            'label' => __('Nombre'), 
                            'autofocus' => true, 
                            'autocomplete' => 'nombre', 
                            'class' => 'form-control',
                            'error' => false // Desactiva los mensajes de error automáticos
                        ]); ?>
                        <?php
                            if ($this->Form->isFieldError('nombre')):?>
                                <div class="invalid-feedback" style="display: block; color: red;">
                                    <?= $this->Form->error('nombre')?>
                                </div>
                            <?php endif;?>
                        <br>
                        <?= $this->Form->control('email', [
                            'type' => 'email',
                            'required' => true,
                            'placeholder' => 'Email', 
                            'label' => __('Email'), 
                            'autofocus' => true, 
                            'autocomplete' => 'email', 
                            'class' => 'form-control',
                            'error' => false // Desactiva los mensajes de error automáticos
                        ]); ?>
                        <?php
                            if ($this->Form->isFieldError('email')):?>
                                <div class="invalid-feedback" style="display: block; color: red;">
                                    <?= $this->Form->error('email')?>
                                </div>
                            <?php endif;?>
                        <br>
                        <div class="form-group">
                            <label for="password-field"><?= __('Password') ?></label>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control <?= $this->Form->isFieldError('password') ? 'is-invalid' : '' ?>" id="password-field" required placeholder="Password">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" id="toggle-password">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <?php if ($this->Form->isFieldError('password')): ?>
                                <div class="invalid-feedback" style="display: block;">
                                    <?= $this->Form->error('password') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="confirm-password-field"><?= __('Confirm Password') ?></label>
                            <div class="input-group">
                                <input type="password" name="confirm_password" class="form-control <?= $this->Form->isFieldError('confirm_password') ? 'is-invalid' : '' ?>" id="confirm-password-field" required placeholder="Confirm Password">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" id="toggle-confirm-password">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <?php if ($this->Form->isFieldError('confirm_password')): ?>
                                <div class="invalid-feedback" style="display: block;">
                                    <?= $this->Form->error('confirm_password') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <br>
                        <div class="text-center">
                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login'])?>">Already have an account?</a>
                            <br>
                            <?= $this->Form->button(__('Register'),['class'=>'btn btn-primary']);?>
                        </div>
                        <br>
                    <?= $this->Form->end()?>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility for password field
        const togglePassword = document.getElementById('toggle-password');
        const passwordField = document.getElementById('password-field');
        
        togglePassword.addEventListener('click', function() {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            
            // Change the eye icon
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
        
        // Toggle password visibility for confirm password field
        const toggleConfirmPassword = document.getElementById('toggle-confirm-password');
        const confirmPasswordField = document.getElementById('confirm-password-field');
        
        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.setAttribute('type', type);
            
            // Change the eye icon
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
    });
</script>