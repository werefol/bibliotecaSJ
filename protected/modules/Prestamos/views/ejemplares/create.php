<?php
$this->breadcrumbs=array(
	'Ejemplares'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ejemplares','url'=>array('index')),
	array('label'=>'Manage Ejemplares','url'=>array('admin')),
);
?>

<h1>Create Ejemplares</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>