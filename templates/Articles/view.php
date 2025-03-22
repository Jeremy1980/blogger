<h1><?= h($article->title) ?></h1>
<p><?= $article->body ?></p>
<p>
    <small><?= $article->published ?$article->published->format(DATE_RFC850) :null ?></small>
    <br>
    <small><?= $article->author ?></small>
</p>
<p class="btn-group" role="group">
    <?= $this->Html->link(__('Edytuj'), ['action' => 'edit', $article->slug], ['class'=>'btn btn-outline-primary']) ?>
    <?php if ($article->activated && $article->published): ?>
    <?php
     if ($article->previous)
     {
        print $this->Html->link(
             __('Poprzedni').'  '.$article->previous['title']
            ,['action' => 'view', $article->previous['slug']]
            ,['class'=>'btn btn-outline-secondary']
        );
     }
    if ($article->next)
    {
        print $this->Html->link(
             __('Co jest następne?').'  '.$article->next['title']
            ,['action' => 'view', $article->next['slug']]
            ,['class'=>'btn btn-outline-secondary']
        );
    }
    ?>
    <?php endif; ?>
</p>