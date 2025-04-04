<h1><?=__('Edytuj artykuł')?></h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->control(
        'title'
        ,['class'=>'form-control' ,'maxlength'=>'55']
    );
    echo $this->Form->control(
        'slug'
        ,['class'=>'form-control']
    );
    echo $this->Form->control(
        'body'
        ,['class'=>'form-control' ,'style' => 'height:300px !important;']
    );
    echo $this->Form->control(
        'author'
        ,['class'=>'form-control' ,'maxlength'=>'24']   
    );
    echo $this->Form->control(
        'published'
        ,['class'=>'form-control']   
    );
    echo $this->Form->control(
        'active'
        ,['type' => 'checkbox' ,'checked'=> ($article->activated ?1 :0) ]
    );
    echo $this->Form->button(
        __('Zapisz artykuł')
        ,['class'=>'btn btn-primary']
    );
    echo $this->Form->end();
?>
<script type="text/javascript">
 bkLib.onDomLoaded(function() { nicEditors.allTextAreas({
     iconsPath : '/img/nicEditorIcons.gif'
    ,buttonList : ['fontSize','indent','outdent','bold','italic','underline','strikeThrough','subscript','superscript'
                    ,'left','center','right','justify','ol','ul',
                    ,'image','link','unlink','hr']
    ,maxHeight : 310
    });
 });
</script>