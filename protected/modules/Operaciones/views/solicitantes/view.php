<?php
$this->breadcrumbs=array(
	'Solicitantes'=>array('index'),
	$model->id_sol,
);

$this->menu=array(
	array('label'=>'List Solicitantes','url'=>array('index')),
	array('label'=>'Create Solicitantes','url'=>array('create')),
	array('label'=>'Update Solicitantes','url'=>array('update','id'=>$model->id_sol)),
	array('label'=>'Delete Solicitantes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sol),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Solicitantes','url'=>array('admin')),
);
?>

<h1>View Solicitantes #<?php echo $model->id_sol; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id_sol',
		'ci_sol',
		'nombre_sol',
		'apellido_sol',
		'telefono_sol',
		'correo_sol',
		'semestre',
		'externo',
		'status_sol',
	),
)); ?>
