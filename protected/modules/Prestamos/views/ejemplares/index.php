<?php
$this->breadcrumbs=array(
	'Ejemplares',
);

$this->menu=array(
	array('label'=>'Create Ejemplares','url'=>array('create')),
	array('label'=>'Manage Ejemplares','url'=>array('admin')),
);
?>

<h1>Ejemplares</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
