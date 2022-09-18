<h1>Edit Article</h1>
<?php
    echo $this->Form->create($article);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('title');
    echo $this->Form->control('body', ['style' => 'height:300px !important;']);
    echo $this->Form->control('active', ['type' => 'checkbox' ,'checked'=> ($article->activated ?1 :0) ]);
    echo $this->Form->button(__('Save Article'));
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