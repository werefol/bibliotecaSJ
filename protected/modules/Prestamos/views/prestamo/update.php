<?php
$this->breadcrumbs=array(
	'Prestamos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prestamo','url'=>array('index')),
	array('label'=>'Create Prestamo','url'=>array('create')),
	array('label'=>'View Prestamo','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Prestamo','url'=>array('admin')),
);
?>

<h1>Update Prestamo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>