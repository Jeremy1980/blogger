<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><?=__('Logowanie')?></h5>
            </div>
            <div class="card-body">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create() ?>
                <div class="mb-3">
                    <?= $this->Form->control('email', [
                        'class' => 'form-control',
                        'placeholder' => __('Podaj adres e-mail'),
                        'label' => ['class' => 'form-label', 'text' => __('Adres e-mail')],
                        'required' => true
                    ]) ?>
                </div>
                <div class="mb-3">
                    <?= $this->Form->control('password', [
                        'class' => 'form-control',
                        'placeholder' => __('Podaj hasło'),
                        'label' => ['class' => 'form-label', 'text' => __('Hasło')],
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
                    <p><?=__('Nie masz konta?')?> <?= $this->Html->link(__('Zarejestruj się'), ['action' => 'register'], ['class' => 'link-primary']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>