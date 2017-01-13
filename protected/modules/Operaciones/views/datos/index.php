<?php
$this->breadcrumbs=array(
	'Datoses',
);

$this->menu=array(
	array('label'=>'Create Datos','url'=>array('create')),
	array('label'=>'Manage Datos','url'=>array('admin')),
);
?>

<h1>Datoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
