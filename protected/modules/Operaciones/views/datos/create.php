<?php
$this->breadcrumbs=array(
	'Datoses'=>array('index'),
	'Create',
);?>

<h1>Nuevo Registro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'tipo'=>$tipo)); ?>