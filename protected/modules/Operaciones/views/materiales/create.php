<?php
$this->breadcrumbs=array(
	'Materiales'=>array('index'),
	'Create',
);
?>

<h1>Registro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>