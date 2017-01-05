<?php
$this->breadcrumbs=array(
	'Tipo Prestamos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TipoPrestamo','url'=>array('index')),
	array('label'=>'Create TipoPrestamo','url'=>array('create')),
	array('label'=>'Update TipoPrestamo','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete TipoPrestamo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoPrestamo','url'=>array('admin')),
);
?>

<h1>View TipoPrestamo #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo_prestamo',
		'borrado',
		'fecha_registro',
	),
)); ?>
