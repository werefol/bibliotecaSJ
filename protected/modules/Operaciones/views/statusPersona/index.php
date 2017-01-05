<?php
$this->breadcrumbs=array(
	'Status Personas',
);

$this->menu=array(
	array('label'=>'Create StatusPersona','url'=>array('create')),
	array('label'=>'Manage StatusPersona','url'=>array('admin')),
);
?>

<h1>Status Personas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
