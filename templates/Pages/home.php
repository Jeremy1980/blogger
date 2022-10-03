<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connection = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return $error ?$error :$connection;
};

$articles_assoc = array();
$conn = $checkConnection('default');
$msg = is_object($conn)?'' :'CakePHP is NOT able to connect to the database.';

if (empty($msg))
{
    $articles_assoc = $conn->execute('SELECT * FROM `articles` WHERE `activated` = "1" AND `published` IS NOT NULL;')->fetchAll('assoc');
}

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CakePHP: the rapid development PHP framework:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'bootstrap.min', 'bootstrap-icons', 'cake', 'home']) ?>
    <?= $this->Html->script(['bootstrap.bundle.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <a href="https://cakephp.org/" target="_blank" rel="noopener">
                <img alt="CakePHP" src="https://cakephp.org/v2/img/logos/CakePHP_Logo.svg" width="350" />
            </a>
            <h1>
                Welcome to CakePHP <?= h(Configure::version()) ?> Strawberry (🍓)
            </h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <?php if ($msg) : ?>
                <ul>
                    <li class="bullet problem"><?= h($msg) ?></li>
                </ul>
                <?php else : ?>
                <?php foreach($articles_assoc as $row): ?>
                <div class="row">
                    <?= $this->Html->link($row['title'], '/articles/view/'.$row['slug']) ?>
                </div>
                <hr>
                <?php endforeach; ?>
                <div class="row">
                    <div class="col-11 text-end">
                        <?= $this->Html->link('Manage articles', '/articles', ['rel' => 'noopener']) ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>
