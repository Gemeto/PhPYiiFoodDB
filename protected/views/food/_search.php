<?php
/* @var $this FoodController */
/* @var $model Food */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombre'); ?>
		<?php echo $form->textArea($model,'Nombre',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kCal'); ?>
		<?php echo $form->textField($model,'kCal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hidratos'); ?>
		<?php echo $form->textField($model,'hidratos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grasas'); ?>
		<?php echo $form->textField($model,'grasas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->