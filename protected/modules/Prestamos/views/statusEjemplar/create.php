<?php
$this->breadcrumbs=array(
	'Status Ejemplars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatusEjemplar','url'=>array('index')),
	array('label'=>'Manage StatusEjemplar','url'=>array('admin')),
);
?>

<h1>Create StatusEjemplar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>