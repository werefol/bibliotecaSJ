<?php
$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->id_usu,
);

$this->menu=array(
	array('label'=>'Lista de Usuarios','url'=>array('index')),
	array('label'=>'Crear Usuario','url'=>array('create')),
	array('label'=>'Actualizar Usuarios','url'=>array('update','id'=>$model->id_usu)),
	array('label'=>'Eliminar Usuarios','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usu),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuarios','url'=>array('admin')),
);
?>

<h2><center><?php echo $model->nombre_usu.' '.$model->apellido_usu; ?></center></h2>

<div class="tabla-datos-container">
	<div class="tabla-datos">
		<?php $this->widget('bootstrap.widgets.TbDetailView',array(
			'type'=>'bordered',
			'data'=>$model,
			'attributes'=>array(
				'id_usu',
				'ci_usu',
				'nombre_usu',
				'apellido_usu',
				'telefono_usu',
				'correo_usu',
				'username',
				'status',
			),
		)); ?>
	</div>
</div>
