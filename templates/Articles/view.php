<h1><?= h($article->title) ?></h1>
<p><?= $article->body ?></p>
<p>
    <small>Created: <?= $article->created->format(DATE_RFC850) ?></small>
    <br>
    <small>User: #<?= $article->user_id ?></small>
</p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?></p>