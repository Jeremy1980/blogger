<h1>Add Article</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('title' ,['class'=>'form-control']);
    echo $this->Form->control('body', [ 'id'=>'htmlEditor' ,'class'=>'form-control' ,'style' => 'height:300px !important;']);
    echo $this->Form->control('active', ['type' => 'checkbox' ,'checked' => False]);
    echo $this->Form->button(__('Save Article') ,['class'=>'btn btn-primary' ,'onclick'=>'nicEditors.findEditor("htmlEditor").saveContent()']);
    echo $this->Form->end();
?>
<script type="text/javascript">
 bkLib.onDomLoaded(function() { new nicEditor({
     iconsPath : '/img/nicEditorIcons.gif'
    ,buttonList : ['fontSize','indent','outdent','bold','italic','underline','strikeThrough','subscript','superscript'
                    ,'left','center','right','justify','ol','ul',
                    ,'image','link','unlink','hr']
    ,maxHeight : 310
    }).panelInstance('htmlEditor'); 
 });
</script>