<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Logowanie</h5>
            </div>
            <div class="card-body">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create() ?>
                <div class="mb-3">
                    <?= $this->Form->control('email', [
                        'class' => 'form-control',
                        'placeholder' => 'Podaj adres e-mail',
                        'label' => ['class' => 'form-label', 'text' => 'Adres e-mail'],
                        'required' => true
                    ]) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('password', [
                        'class' => 'form-control',
                        'placeholder' => 'Podaj hasło',
                        'label' => ['class' => 'form-label', 'text' => 'Hasło'],
                        'required' => true
                    ]) ?>
                </div>
                <div class="d-grid gap-2">
                    <?= $this->Form->button(__('Zaloguj się'), ['class' => 'btn btn-primary']) ?>
                </div>
                <?= $this->Form->end() ?>
                <div class="mt-3 text-center">
                    <p>
                        <?= $this->Html->link(__('Zapomniałeś hasła?'), ['action' => 'forgotPassword'], ['class' => 'link-primary']) ?>
                    </p>
                    <p>Nie masz konta? <?= $this->Html->link(__('Zarejestruj się'), ['action' => 'register'], ['class' => 'link-primary']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>