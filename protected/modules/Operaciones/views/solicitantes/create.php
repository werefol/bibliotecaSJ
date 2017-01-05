<?php
$this->breadcrumbs=array(
	'Solicitantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Solicitantes','url'=>array('index')),
	array('label'=>'Manage Solicitantes','url'=>array('admin')),
);
?>

<h1>Create Solicitantes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>