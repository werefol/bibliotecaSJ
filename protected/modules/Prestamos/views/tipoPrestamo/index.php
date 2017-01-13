<?php
$this->breadcrumbs=array(
	'Tipo Prestamos',
);

$this->menu=array(
	array('label'=>'Create TipoPrestamo','url'=>array('create')),
	array('label'=>'Manage TipoPrestamo','url'=>array('admin')),
);
?>

<h1>Tipo Prestamos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
