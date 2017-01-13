<?php
$this->breadcrumbs=array(
	'Prestamo Ejemplars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PrestamoEjemplar','url'=>array('index')),
	array('label'=>'Create PrestamoEjemplar','url'=>array('create')),
	array('label'=>'Update PrestamoEjemplar','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete PrestamoEjemplar','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PrestamoEjemplar','url'=>array('admin')),
);
?>

<h1>View PrestamoEjemplar #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_prestamo',
		'id_ejemplar',
		'borrado',
		'fecha_registro',
	),
)); ?>
