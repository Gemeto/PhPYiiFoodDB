<?php
/* @var $this IngestController */
/* @var $model Ingest */

$this->breadcrumbs=array(
	'Ingests'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ingest', 'url'=>array('index')),
	array('label'=>'Create Ingest', 'url'=>array('create')),
	array('label'=>'Update Ingest', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ingest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ingest', 'url'=>array('admin')),
);
?>

<h1>View Ingest #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'food',
		'food_id',
		'hora',
	),
)); ?>
