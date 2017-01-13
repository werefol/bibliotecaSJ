<?php
$this->breadcrumbs=array(
	'Personas',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('datos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php if ($tipo == 1) {?>

<h1>Lista de Usuarios</h1>

	<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'datos-grid',
		'dataProvider'=>$model->search($tipo),
		'filter'=>$model,
		'columns'=>array(
			
			array('name'=>'nombres',
					'value'=>'$data->nombres',
					),

			array('name'=>'apellidos',
					'value'=>'$data->apellidos',
					),

			array('name'=>'cedula',
					'value'=>'$data->cedula',
					),

			array(
				'name' => 'id_tipo',
				'value' => '$data->idTipo->tipo',
				),

			array('name'=>'telefono',
					'value'=>'$data->telefono',
					),

			array('name'=>'correo',
					'value'=>'$data->correo',
					),
			/*
			'interno',
			'semestre',
			'id_status',
			'username',
			'password',
			'borrado',
			'fecha_registro',
			*/
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
			),
		),
	)); ?>

<?php }elseif ($tipo == 2) {?>
	
	<h1>Lista de Estudiantes</h1>

	<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'datos-grid',
		'dataProvider'=>$model->search($tipo),
		'filter'=>$model,
		'columns'=>array(

			array('name'=>'nombres',
					'value'=>'$data->nombres',
					),

			array('name'=>'apellidos',
					'value'=>'$data->apellidos',
					),

			array('name'=>'cedula',
					'value'=>'$data->cedula',
					),

			array(
				'name' => 'id_tipo',
				'value' => '$data->idTipo->tipo',
				),

			array('name'=>'telefono',
					'value'=>'$data->telefono',
					),

			array('name'=>'correo',
					'value'=>'$data->correo',
					),

			array('name'=>'interno',
					'value'=>"(\$data->interno == 1)?'Si':'No'",
					//'value'=>'$data->interno',
					),

			array('name'=>'semestre',
					'value'=>"(\$data->interno == 1)?\$data->semestre:'El estudiante es externo'",
					//'value'=>'$data->interno',
					),
			/*
			'interno',
			'semestre',
			'id_status',
			'username',
			'password',
			'borrado',
			'fecha_registro',
			*/
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
			),
		),
	)); ?>

<?php }elseif ($tipo == 3) {?>

	<h1>Lista de Profesores</h1>

	<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'datos-grid',
		'dataProvider'=>$model->search($tipo),
		'filter'=>$model,
		'columns'=>array(

			array('name'=>'nombres',
					'value'=>'$data->nombres',
					),

			array('name'=>'apellidos',
					'value'=>'$data->apellidos',
					),

			array('name'=>'cedula',
					'value'=>'$data->cedula',
					),

			array(
				'name' => 'id_tipo',
				'value' => '$data->idTipo->tipo',
				),

			array('name'=>'telefono',
					'value'=>'$data->telefono',
					),

			array('name'=>'correo',
					'value'=>'$data->correo',
					),
			/*
			'interno',
			'semestre',
			'id_status',
			'username',
			'password',
			'borrado',
			'fecha_registro',
			*/
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
			),
		),
	)); ?>

<?php } ?>
