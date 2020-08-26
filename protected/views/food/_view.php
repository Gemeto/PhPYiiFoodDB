<?php
/* @var $this FoodController */
/* @var $data Food */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kCal')); ?>:</b>
	<?php echo CHtml::encode($data->kCal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidratos')); ?>:</b>
	<?php echo CHtml::encode($data->hidratos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grasas')); ?>:</b>
	<?php echo CHtml::encode($data->grasas); ?>
	<br />


</div>