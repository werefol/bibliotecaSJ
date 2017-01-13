<?php
$this->breadcrumbs=array(
	'Prestamo Ejemplars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PrestamoEjemplar','url'=>array('index')),
	array('label'=>'Manage PrestamoEjemplar','url'=>array('admin')),
);
?>

<h1>Create PrestamoEjemplar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>