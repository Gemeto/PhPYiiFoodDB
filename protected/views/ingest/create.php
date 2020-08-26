<?php
/* @var $this IngestController */
/* @var $model Ingest */

$this->breadcrumbs=array(
	'Ingests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ingest', 'url'=>array('index')),
	array('label'=>'Manage Ingest', 'url'=>array('admin')),
);
?>

<h1>Create Ingest</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>