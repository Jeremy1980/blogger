<h1><?= h($article->title) ?></h1>
<p><?= $article->body ?></p>
<p>
    <small><?= $article->published ?$article->published->format(DATE_RFC850) :null ?></small>
    <br>
    <small>#<?= $article->user_id ?></small>
</p>
<p class="btn-group" role="group">
    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->slug], ['class'=>'btn btn-outline-primary']) ?>
    <?php if ($article->activated && $article->published): ?>
    <?php
     if ($article->previous)
     {
         print $this->Html->link('Previously '.$article->previous['title'], ['action' => 'view', $article->previous['slug']], ['class'=>'btn btn-outline-secondary']); 
     }
    ?>
    <?php
      if ($article->next)
      {
          print $this->Html->link('What is next? '.$article->next['title'], ['action' => 'view', $article->next['slug']], ['class'=>'btn btn-outline-secondary']);
      }
    ?>
    <?php endif; ?>
</p>