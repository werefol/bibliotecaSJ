<?php
$this->breadcrumbs=array(
	'Status Personas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StatusPersona','url'=>array('index')),
	array('label'=>'Create StatusPersona','url'=>array('create')),
	array('label'=>'View StatusPersona','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage StatusPersona','url'=>array('admin')),
);
?>

<h1>Update StatusPersona <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>