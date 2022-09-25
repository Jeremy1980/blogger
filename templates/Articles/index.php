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

<h1><?=__('Articles')?></h1>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('title',__('Title')) ?></th>
        <th scope="col"><?= $this->Paginator->sort('created',__('Created')) ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified',__('Modified')) ?></th>
        <th scope="col"><?= $this->Paginator->sort('published',__('Published')) ?></th>
        <th scope="col"><?= __('Action') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article): ?>
    <tr scope="row">
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
        </td>
        <td>
            <?= $article->created->nice() ?>
        </td>
        <td>
            <?= $article->modified->nice() ?>
        </td>
        <td>
            <?= empty($article->published) ?__("Draft") :$article->published->nice() ?>
            <?= $article->activated ?"/Active/" :"/Inactive/" ?>
        </td>
        <td>
            <?= $this->Html->link(__('Publish'), ['action' => 'publish', $article->slug]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->slug]) ?>
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