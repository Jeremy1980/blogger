<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Resetowanie hasła</h5>
            </div>
            <div class="card-body">
                <p class="card-text">Podaj adres e-mail, na który zostanie wysłany odnośnik do resetowania hasła.</p>
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
                <div class="d-grid gap-2">
                    <?= $this->Form->button(__('Wyślij odnośnik resetujący'), ['class' => 'btn btn-primary']) ?>
                </div>
                <?= $this->Form->end() ?>
                <div class="mt-3 text-center">
                    <p><?= $this->Html->link(__('Powrót do logowania'), ['action' => 'login'], ['class' => 'odnośnik-primary']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>