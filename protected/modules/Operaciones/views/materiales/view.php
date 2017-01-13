<?php
$this->breadcrumbs=array(
	'Materiales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Materiales','url'=>array('index')),
	array('label'=>'Create Materiales','url'=>array('create')),
	array('label'=>'Update Materiales','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Materiales','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Materiales','url'=>array('admin')),
);
?>

<h1>View Materiales #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cota',
		'autor',
		'anio',
		'editorial',
		'edicion',
		'volumen',
		'tomo',
		'tutor',
		'id_tipomat',
		'titulo',
		'pais',
		'subtitulo',
		'issn',
		'deposito_legal',
		'mencion',
		'borrado',
		'fecha_registro',
		'cantidad',
	),
)); ?>
