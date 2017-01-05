<?php
$this->breadcrumbs=array(
	'Datoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Datos','url'=>array('index')),
	array('label'=>'Create Datos','url'=>array('create')),
	array('label'=>'View Datos','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Datos','url'=>array('admin')),
);
?>

<h1>Update Datos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'tipo'=>$tipo)); ?>