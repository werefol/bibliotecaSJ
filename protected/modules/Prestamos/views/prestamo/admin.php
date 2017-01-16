<?php
$this->breadcrumbs=array(
	'Prestamos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Prestamo','url'=>array('index')),
	array('label'=>'Create Prestamo','url'=>array('create')),
);
?>

<h1>Prestamos</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'prestamo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_solicitante',
		'id_prestador',
		'id_receptor',
		'id_tipoprestamo',
		'cant_material',
		'fecha_prestamo',
		'id_status',
		/*
		'fecha_entrega',
		'renovacion',
		'borrado',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
