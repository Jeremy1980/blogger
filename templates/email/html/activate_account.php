<h2>Aktywacja konta</h2>
<p>Witaj <?= $user->first_name ?>,</p>
<p>Dziękujemy za rejestrację. Aby aktywować swoje konto, kliknij poniższy odnośnik:</p>
<p>
    <a href="<?= $activationUrl ?>" style="display: inline-block; padding: 10px 20px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 5px;">Aktywuj konto</a>
</p>
<p>Jeżeli odnośnik nie działa, skopiuj i wklej poniższy adres do przeglądarki:</p>
<p><?= $activationUrl ?></p>
<p>Pozdrawiamy,<br>Zespół <?= \Cake\Core\Configure::read('App.name', 'CakePHP') ?></p>