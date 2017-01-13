<?php
$this->breadcrumbs=array(
	'Tipo Prestamos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoPrestamo','url'=>array('index')),
	array('label'=>'Create TipoPrestamo','url'=>array('create')),
	array('label'=>'View TipoPrestamo','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TipoPrestamo','url'=>array('admin')),
);
?>

<h1>Update TipoPrestamo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>