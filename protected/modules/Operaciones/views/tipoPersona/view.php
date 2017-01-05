<?php
$this->breadcrumbs=array(
	'Tipo Personas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TipoPersona','url'=>array('index')),
	array('label'=>'Create TipoPersona','url'=>array('create')),
	array('label'=>'Update TipoPersona','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete TipoPersona','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoPersona','url'=>array('admin')),
);
?>

<h1>View TipoPersona #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo',
		'borrado',
		'fecha_registro',
	),
)); ?>
