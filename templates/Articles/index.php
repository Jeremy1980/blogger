<?php
    $this->Paginator->setTemplates([
        'first' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'current' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
    ]);
?>        

<h1>Articles</h1>
<table>
    <thead>
    <tr>
        <th><?= $this->Html->link(__('Title'), '?sort=title') ?></th>
        <th><?= $this->Html->link(__('Created'), '?sort=created') ?></th>
        <th><?= $this->Html->link(__('Published'), '?sort=published') ?></th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article): ?>
    <tr>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= empty($article->published) ?"Draft" :$article->published->format(DATE_RFC850) ?>
            <?= $article->activated ?"/Active/" :"/Inactive/" ?>
        </td>
        <td>
            <?= $this->Html->link('Publish', ['action' => 'publish', $article->slug]) ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $article->slug],
                ['confirm' => 'Are you sure?'])
            ?>            
        </td>        
    </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?= $this->Paginator->first(__('First')) ?>
                    <?= $this->Paginator->prev(__('Previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Next')) ?>
                    <?= $this->Paginator->last(__('Last')) ?>
                </ul>
            </nav>
        </div>
    </div>