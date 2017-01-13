<?php
$this->breadcrumbs=array(
	'Datoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Datos','url'=>array('index')),
	array('label'=>'Create Datos','url'=>array('create')),
	array('label'=>'Update Datos','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Datos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Datos','url'=>array('admin')),
);
?>

<h1>View Datos #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombres',
		'apellidos',
		'cedula',
		'telefono',
		'correo',
		'interno',
		'semestre',
		'id_tipo',
		'id_status',
		'username',
		'password',
		'borrado',
		'fecha_registro',
	),
)); ?>
