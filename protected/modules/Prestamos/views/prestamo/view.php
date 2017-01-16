<?php
$this->breadcrumbs=array(
	'Prestamos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Prestamo','url'=>array('index')),
	array('label'=>'Create Prestamo','url'=>array('create')),
	array('label'=>'Update Prestamo','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Prestamo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prestamo','url'=>array('admin')),
);
?>

<h1>View Prestamo #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_prestador',
		'id_solicitante',
		'id_tipoprestamo',
		'id_receptor',
		'fecha_prestamo',
		'fecha_entrega',
		'cant_material',
		'renovacion',
		'borrado',
		'id_status',
	),
)); ?>
