<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->id_usu=>array('view','id'=>$model->id_usu),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usuarios','url'=>array('index')),
	array('label'=>'Create Usuarios','url'=>array('create')),
	array('label'=>'View Usuarios','url'=>array('view','id'=>$model->id_usu)),
	array('label'=>'Manage Usuarios','url'=>array('admin')),
);
?>

<h1>Update Usuarios <?php echo $model->id_usu; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>