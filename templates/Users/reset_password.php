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
                <h5 class="card-title mb-0"><?=__('Ustaw nowe hasło')?></h5>
            </div>
            <div class="card-body">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($user) ?>
                <div class="mb-3">
                    <?= $this->Form->control('password', [
                        'class' => 'form-control',
                        'placeholder' => __('Minimum 8 znaków'),
                        'label' => ['class' => 'form-label', 'text' => __('Nowe hasło')],
                        'required' => true,
                        'value' => ''
                    ]) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('password_confirm', [
                        'type' => 'password',
                        'class' => 'form-control',
                        'placeholder' => __('Powtórz nowe hasło'),
                        'label' => ['class' => 'form-label', 'text' => __('Potwierdź nowe hasło')],
                        'required' => true
                    ]) ?>
                </div>
                <div class="d-grid gap-2">
                    <?= $this->Form->button(__('Zapisz nowe hasło'), ['class' => 'btn btn-primary']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>