<?php
$this->breadcrumbs=array(
	'Status Ejemplars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatusEjemplar','url'=>array('index')),
	array('label'=>'Create StatusEjemplar','url'=>array('create')),
	array('label'=>'View StatusEjemplar','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage StatusEjemplar','url'=>array('admin')),
);
?>

<h1>Update StatusEjemplar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>