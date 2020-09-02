<?php
/* @var $this CommentController */
/* @var $data Comment */
/* @var $answer Comment */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('commentary')); ?>:</b>
    <?php echo CHtml::encode($data->commentary); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
    <?php echo CHtml::encode($data->date); ?>
    <br />

    <script type="text/javascript">
        window.onload = function(){
            for (let el of document.querySelectorAll('.respuesta')) el.style.visibility = 'hidden';
            for (let el of document.querySelectorAll('.btnButton2')) el.style.visibility = 'hidden';

            for (let el of document.querySelectorAll('.btnButton')) el.onclick = function() {
                for (let el of document.querySelectorAll('.respuesta')) el.style.visibility = 'visible';
                for (let el of document.querySelectorAll('.btnButton')) el.style.visibility = 'hidden';
                for (let el of document.querySelectorAll('.btnButton2')) el.style.visibility = 'visible';
            };
            for (let el of document.querySelectorAll('.btnButton2')) el.onclick = function () {
                for (let el of document.querySelectorAll('.respuesta')) el.style.visibility = 'hidden';
                for (let el of document.querySelectorAll('.btnButton')) el.style.visibility = 'visible';
                for (let el of document.querySelectorAll('.btnButton2')) el.style.visibility = 'hidden';
            };
        };
    </script>
    <div>
        <input class="btnButton" type="button" value="Responder"/>
    </div>
    <div class="respuesta" style="float:left">
    <?php
    $this->renderPartial('/comment/_form',array(
    'model'=>$answer,
    'original_id'=>$data->id,
    )); ?>
    </div>
    <div>
    <?php
    $comments = Comment::listFromOriginComment($data->id);
    foreach($comments as $c){
    $this->renderPartial('_comment', array(
    'data' => $c,
    'answer' => $answer,
    ));
    }
    ?>
    </div>
    <input class="btnButton2" type="button" value="Cerrar"/>

</div>