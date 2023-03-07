<h1><?=__('Add Article')?></h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->control(
        'title'
        ,['class'=>'form-control' ,'maxlength'=>'55']
    );
    echo $this->Form->control(
        'body'
        ,[ 'id'=>'htmlEditor' ,'class'=>'form-control' ,'style' => 'height:300px !important;']
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
        ,['type' => 'checkbox' ,'checked' => False]
    );
    echo $this->Form->button(
        __('Save Article')
        ,['class'=>'btn btn-primary' ,'onclick'=>'nicEditors.findEditor("htmlEditor").saveContent()']
    );
    echo $this->Form->end();
?>
<script type="text/javascript">
 bkLib.onDomLoaded(function() { new nicEditor({
     iconsPath : '/img/nicEditorIcons.gif'
    ,buttonList : ['fontSize','indent','outdent','bold','italic','underline','strikethrough','subscript','superscript'
                    ,'left','center','right','justify','ol','ul',
                    ,'image','link','unlink','hr']
    ,maxHeight : 310
    }).panelInstance('htmlEditor');
 });
</script>