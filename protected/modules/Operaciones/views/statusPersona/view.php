<?php
$this->breadcrumbs=array(
	'Status Personas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatusPersona','url'=>array('index')),
	array('label'=>'Create StatusPersona','url'=>array('create')),
	array('label'=>'Update StatusPersona','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete StatusPersona','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatusPersona','url'=>array('admin')),
);
?>

<h1>View StatusPersona #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'estado',
		'borrado',
		'fecha_registro',
	),
)); ?>
