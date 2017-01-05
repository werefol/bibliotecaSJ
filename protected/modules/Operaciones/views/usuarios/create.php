<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Usuarios','url'=>array('index')),
	array('label'=>'Manage Usuarios','url'=>array('admin')),
);
?>


<center><h1>Crear nuevo usuario</h1></center>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
