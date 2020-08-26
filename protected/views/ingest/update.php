<?php
/* @var $this IngestController */
/* @var $model Ingest */

$this->breadcrumbs=array(
	'Ingests'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ingest', 'url'=>array('index')),
	array('label'=>'Create Ingest', 'url'=>array('create')),
	array('label'=>'View Ingest', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ingest', 'url'=>array('admin')),
);
?>

<h1>Update Ingest <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>