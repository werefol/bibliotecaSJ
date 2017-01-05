<?php
$this->breadcrumbs=array(
	'Tipo Personas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoPersona','url'=>array('index')),
	array('label'=>'Create TipoPersona','url'=>array('create')),
	array('label'=>'View TipoPersona','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TipoPersona','url'=>array('admin')),
);
?>

<h1>Update TipoPersona <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>