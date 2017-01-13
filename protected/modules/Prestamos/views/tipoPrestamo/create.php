<?php
$this->breadcrumbs=array(
	'Tipo Prestamos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoPrestamo','url'=>array('index')),
	array('label'=>'Manage TipoPrestamo','url'=>array('admin')),
);
?>

<h1>Create TipoPrestamo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>