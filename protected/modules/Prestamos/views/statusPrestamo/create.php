<?php
$this->breadcrumbs=array(
	'Status Prestamos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatusPrestamo','url'=>array('index')),
	array('label'=>'Manage StatusPrestamo','url'=>array('admin')),
);
?>

<h1>Create StatusPrestamo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>