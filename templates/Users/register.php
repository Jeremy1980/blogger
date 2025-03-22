<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Rejestracja</h5>
            </div>
            <div class="card-body">
                <?= $this->Form->create($user, ['class' => 'needs-validation']) ?>
                <div class="mb-3">
                    <?= $this->Form->control('email', [
                        'class' => 'form-control',
                        'placeholder' => 'Podaj adres e-mail',
                        'label' => ['class' => 'form-label', 'text' => 'Adres e-mail'],
                        'required' => true
                    ]) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('first_name', [
                        'class' => 'form-control',
                        'placeholder' => 'Podaj imię',
                        'label' => ['class' => 'form-label', 'text' => 'Imię'],
                        'required' => true
                    ]) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('last_name', [
                        'class' => 'form-control',
                        'placeholder' => 'Podaj nazwisko',
                        'label' => ['class' => 'form-label', 'text' => 'Nazwisko'],
                        'required' => true
                    ]) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('password', [
                        'class' => 'form-control',
                        'placeholder' => 'Minimum 8 znaków',
                        'label' => ['class' => 'form-label', 'text' => 'Hasło'],
                        'required' => true
                    ]) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('password_confirm', [
                        'type' => 'password',
                        'class' => 'form-control',
                        'placeholder' => 'Powtórz hasło',
                        'label' => ['class' => 'form-label', 'text' => 'Potwierdź hasło'],
                        'required' => true
                    ]) ?>
                </div>
                <div class="d-grid gap-2">
                    <?= $this->Form->button(__('Zarejestruj się'), ['class' => 'btn btn-primary']) ?>
                </div>
                <?= $this->Form->end() ?>
                <div class="mt-3 text-center">
                    <p>Masz już konto? <?= $this->Html->link(__('Zaloguj się'), ['action' => 'login'], ['class' => 'link-primary']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>