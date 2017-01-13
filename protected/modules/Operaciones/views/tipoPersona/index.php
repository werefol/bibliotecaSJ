<?php
$this->breadcrumbs=array(
	'Tipo Personas',
);

$this->menu=array(
	array('label'=>'Create TipoPersona','url'=>array('create')),
	array('label'=>'Manage TipoPersona','url'=>array('admin')),
);
?>

<h1>Tipo Personas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
