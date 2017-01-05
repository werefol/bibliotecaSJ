<?php
$this->breadcrumbs=array(
	'Status Personas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StatusPersona','url'=>array('index')),
	array('label'=>'Manage StatusPersona','url'=>array('admin')),
);
?>

<h1>Create StatusPersona</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>