<?php
/* @var $this FoodController */
/* @var $model Food */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'food-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textArea($model,'Nombre',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kCal'); ?>
		<?php echo $form->textField($model,'kCal'); ?>
		<?php echo $form->error($model,'kCal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidratos'); ?>
		<?php echo $form->textField($model,'hidratos'); ?>
		<?php echo $form->error($model,'hidratos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grasas'); ?>
		<?php echo $form->textField($model,'grasas'); ?>
		<?php echo $form->error($model,'grasas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->