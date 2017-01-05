<?php
$this->breadcrumbs=array(
	'Prestamo Ejemplars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PrestamoEjemplar','url'=>array('index')),
	array('label'=>'Create PrestamoEjemplar','url'=>array('create')),
	array('label'=>'View PrestamoEjemplar','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage PrestamoEjemplar','url'=>array('admin')),
);
?>

<h1>Update PrestamoEjemplar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>