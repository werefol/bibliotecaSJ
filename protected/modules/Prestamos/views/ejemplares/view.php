<?php
$this->breadcrumbs=array(
	'Ejemplares'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ejemplares','url'=>array('index')),
	array('label'=>'Create Ejemplares','url'=>array('create')),
	array('label'=>'Update Ejemplares','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Ejemplares','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ejemplares','url'=>array('admin')),
);
?>

<h1>View Ejemplares #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_material',
		'ejemplar',
		'observaciones',
		'borrado',
		'fecha_registro',
		'id_status',
	),
)); ?>
