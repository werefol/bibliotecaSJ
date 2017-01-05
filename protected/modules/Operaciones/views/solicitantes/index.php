<?php
$this->breadcrumbs=array(
	'Solicitantes',
);

$this->menu=array(
	array('label'=>'Create Solicitantes','url'=>array('create')),
	array('label'=>'Manage Solicitantes','url'=>array('admin')),
);
?>

<h1>Solicitantes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
