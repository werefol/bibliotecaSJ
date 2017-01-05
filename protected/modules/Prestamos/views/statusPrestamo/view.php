<?php
$this->breadcrumbs=array(
	'Status Prestamos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StatusPrestamo','url'=>array('index')),
	array('label'=>'Create StatusPrestamo','url'=>array('create')),
	array('label'=>'Update StatusPrestamo','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete StatusPrestamo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StatusPrestamo','url'=>array('admin')),
);
?>

<h1>View StatusPrestamo #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'status',
		'borrado',
		'fecha_registro',
	),
)); ?>
