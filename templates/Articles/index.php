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

<h1><?=__('Artykuły')?></h1>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('title',__('Tytuł')) ?></th>
        <th scope="col"><?= $this->Paginator->sort('created',__('Utworzono')) ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified',__('Zmodyfikowano')) ?></th>
        <th scope="col"><?= $this->Paginator->sort('published',__('Opubilkowano')) ?></th>
        <th scope="col"><?= __('Akcja') ?></th>
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
            <?= empty($article->published) ?__("Szlic") :$article->published->nice() ?>
            <?= $article->activated ?"/Aktywne/" :"/Nieaktywne/" ?>
        </td>
        <td>
            <?= $this->Html->link(__('Opublikuj'), ['action' => 'publish', $article->slug]) ?>
            <?= $this->Html->link(__('Edycja'), ['action' => 'edit', $article->slug]) ?>
            <?= $this->Form->postLink(
                'Usuń',
                ['action' => 'delete', $article->slug],
                ['confirm' => 'Czy napewno usunąć?'])
            ?>            
        </td>        
    </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    
    <?php if($this->Paginator->numbers()): ?>
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?= $this->Paginator->first(__('<<')) ?>
                    <?= $this->Paginator->prev(__('<')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('>')) ?>
                    <?= $this->Paginator->last(__('>>')) ?>
                </ul>
            </nav>
        </div>
    </div>
    <?php endif; ?>