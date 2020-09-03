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

    <input id="btnButton2<?php echo $data->id ?>" type="button" value="Cerrar"/>

    <script type="text/javascript">
        document.getElementById("respuesta<?php echo $data->id ?>").style.display = "none";
        document.getElementById("btnButton2<?php echo $data->id ?>").style.display = "none";

        document.getElementById("btnButton<?php echo $data->id ?>").onclick = function() {
            document.getElementById("respuesta<?php echo $data->id ?>").style.display = "initial";
            document.getElementById("btnButton<?php echo $data->id ?>").style.display = "none";
            document.getElementById("btnButton2<?php echo $data->id ?>").style.display = "initial";
        };
        document.getElementById("btnButton2<?php echo $data->id ?>").onclick = function () {
            document.getElementById("respuesta<?php echo $data->id ?>").style.display = "none";
            document.getElementById("btnButton<?php echo $data->id ?>").style.display = "initial";
            document.getElementById("btnButton2<?php echo $data->id ?>").style.display = "none";
        };
    </script>

</div>