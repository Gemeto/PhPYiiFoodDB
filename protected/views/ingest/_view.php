<?php
/* @var $this IngestController */
/* @var $data Ingest */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('food')); ?>:</b>
	<?php echo CHtml::encode($data->food); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('food_id')); ?>:</b>
	<?php echo CHtml::encode($data->food_id); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('unidades')); ?>:</b>
    <?php echo CHtml::encode($data->hora); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora')); ?>:</b>
	<?php echo CHtml::encode($data->hora); ?>
	<br />


</div>