<?php
/* @var $this IngestController */
/* @var $data Ingest */
?>

<div class="view">

	<?php echo CHtml::link(CHtml::encode("Comida"), array('view', 'id'=>$data->id)); ?>
    <b> de <?php echo User::model()->findAll("id = {$data->user_id}")[0]->email ?></b>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('food_id')); ?>:</b>
	<?php echo CHtml::encode($data->food_id); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('unidades')); ?>:</b>
    <?php echo CHtml::encode($data->unidades); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora')); ?>:</b>
	<?php echo CHtml::encode($data->hora); ?>
	<br />


</div>