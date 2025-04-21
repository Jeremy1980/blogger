<h2>__('Aktywacja konta')</h2>
<p>__('Witaj') <?= $user->first_name ?>,</p>
<p>__('Dziękujemy za rejestrację. Aby aktywować swoje konto, kliknij poniższy odnośnik'):</p>
<p>
    <a href="<?= $activationUrl ?>" style="display: inline-block; padding: 10px 20px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 5px;">Aktywuj konto</a>
</p>
<p>__('Jeżeli odnośnik nie działa, skopiuj i wklej poniższy adres do przeglądarki'):</p>
<p><?= $activationUrl ?></p>
<p>__('Pozdrawiamy'),<br>__('Zespół') <?= \Cake\Core\Configure::read('App.name', 'CakePHP') ?></p>