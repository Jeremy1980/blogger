<h2>__('Resetowanie hasła')</h2>
<p>__('Witaj') <?= $user->first_name ?>,</p>
<p>__('Otrzymaliśmy prośbę o zresetowanie hasła do Twojego konta. Aby kontynuować, kliknij poniższy odnośnik'):</p>
<p>
    <a href="<?= $resetUrl ?>" style="display: inline-block; padding: 10px 20px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 5px;">Resetuj hasło</a>
</p>
<p>__('Jeżeli odnośnik nie działa, skopiuj i wklej poniższy adres do przeglądarki'):</p>
<p><?= $resetUrl ?></p>
<p>__('Odnośnik wygaśnie po godzinie. Jeżeli nie prosiłeś o resetowanie hasła, zignoruj tę wiadomość.')</p>
<p>__('Pozdrawiamy'),<br>__('Zespół') <?= \Cake\Core\Configure::read('App.name', 'CakePHP') ?></p>