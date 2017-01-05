<?php
$this->breadcrumbs=array(
	'Solicitantes'=>array('index'),
	$model->id_sol=>array('view','id'=>$model->id_sol),
	'Update',
);

$this->menu=array(
	array('label'=>'List Solicitantes','url'=>array('index')),
	array('label'=>'Create Solicitantes','url'=>array('create')),
	array('label'=>'View Solicitantes','url'=>array('view','id'=>$model->id_sol)),
	array('label'=>'Manage Solicitantes','url'=>array('admin')),
);
?>

<h1>Update Solicitantes <?php echo $model->id_sol; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>