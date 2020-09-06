<?php
/* @var $this CommentController */
/* @var $data Comment */
/* @var $answer Comment */
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('commentary')); ?>:</b>
    <?php echo CHtml::encode($data->commentary); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
    <?php echo CHtml::encode($data->date); ?>
    <br />

    <div>
        <input id="btnButton<?php echo $data->id ?>" type="button" value="Responder"/>
    </div>

    <div id="respuesta<?php echo $data->id ?>">
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

    <script type="text/javascript">
        $("#respuesta<?php echo $data->id ?>").hide();
        $("#btnButton<?php echo $data->id ?>").click(function() {
            $("#respuesta<?php echo $data->id ?>").animate({height:'toggle'});
            $("#btnButton<?php echo $data->id ?>").val($("#btnButton<?php echo $data->id ?>").val()=="Cerrar" ? "Responder" : "Cerrar");
        });

    </script>

</div>