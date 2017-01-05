<?php
$this->breadcrumbs=array(
	'Prestamos',
);

$this->menu=array(
	array('label'=>'Create Prestamo','url'=>array('create')),
	array('label'=>'Manage Prestamo','url'=>array('admin')),
);
?>

<h1>Prestamos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
