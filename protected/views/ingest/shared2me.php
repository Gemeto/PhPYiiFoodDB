<?php
/* @var $this IngestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ingests',
);

$this->menu=array(
	array('label'=>'Create Ingest', 'url'=>array('create')),
	array('label'=>'Manage Ingest', 'url'=>array('admin')),
);
?>

<h1>Ingests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>