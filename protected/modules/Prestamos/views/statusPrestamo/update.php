<?php
$this->breadcrumbs=array(
	'Status Prestamos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatusPrestamo','url'=>array('index')),
	array('label'=>'Create StatusPrestamo','url'=>array('create')),
	array('label'=>'View StatusPrestamo','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage StatusPrestamo','url'=>array('admin')),
);
?>

<h1>Update StatusPrestamo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>