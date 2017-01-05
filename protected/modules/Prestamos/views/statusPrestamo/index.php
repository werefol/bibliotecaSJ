<?php
$this->breadcrumbs=array(
	'Status Prestamos',
);

$this->menu=array(
	array('label'=>'Create StatusPrestamo','url'=>array('create')),
	array('label'=>'Manage StatusPrestamo','url'=>array('admin')),
);
?>

<h1>Status Prestamos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
