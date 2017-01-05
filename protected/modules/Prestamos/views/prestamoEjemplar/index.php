<?php
$this->breadcrumbs=array(
	'Prestamo Ejemplars',
);

$this->menu=array(
	array('label'=>'Create PrestamoEjemplar','url'=>array('create')),
	array('label'=>'Manage PrestamoEjemplar','url'=>array('admin')),
);
?>

<h1>Prestamo Ejemplars</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
