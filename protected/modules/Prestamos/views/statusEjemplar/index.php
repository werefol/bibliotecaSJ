<?php
$this->breadcrumbs=array(
	'Status Ejemplars',
);

$this->menu=array(
	array('label'=>'Create StatusEjemplar','url'=>array('create')),
	array('label'=>'Manage StatusEjemplar','url'=>array('admin')),
);
?>

<h1>Status Ejemplars</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
