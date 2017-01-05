<?php
$this->breadcrumbs=array(
	'Prestamos'=>array('index'),
	'Realizar Prestamo',
);
?>

<h1>Realizar Prestamo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'materiales'=>$materiales, 'tMaterial' => $tMaterial,'modelDatos' => $modelDatos,)); ?>