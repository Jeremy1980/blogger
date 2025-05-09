<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$action = $this->request->getParam('action');
?>


<!DOCTYPE html>
<html>
<head>
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('icon') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'bootstrap.min', 'bootstrap-icons', 'cake']) ?>
    <?= $this->Html->script(['bootstrap.bundle.min','nicEdit']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <?php if ($action !== "view"): ?>
            <?= $this->Html->link(__('Dodaj artykuł'), ['action' => 'add']) ?>
            <?= $this->Html->link(__('Artykuły'), '/articles', ['rel' => 'noopener']) ?>
            <?= $this->Html->link(__('Wyloguj się'), '/users/logout', ['rel' => 'noopener']) ?>
            <?php endif; ?>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <div class="content mb-5">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
