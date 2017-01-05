<?php
$this->breadcrumbs=array(
	'Status Ejemplars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatusEjemplar','url'=>array('index')),
	array('label'=>'Create StatusEjemplar','url'=>array('create')),
	array('label'=>'Update StatusEjemplar','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete StatusEjemplar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatusEjemplar','url'=>array('admin')),
);
?>

<h1>View StatusEjemplar #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'estado_ej',
		'borrado',
		'fecha_registro',
	),
)); ?>
