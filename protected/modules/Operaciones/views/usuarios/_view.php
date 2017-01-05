<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usu')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usu),array('view','id'=>$data->id_usu)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ci_usu')); ?>:</b>
	<?php echo CHtml::encode($data->ci_usu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_usu')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_usu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_usu')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_usu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_usu')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_usu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo_usu')); ?>:</b>
	<?php echo CHtml::encode($data->correo_usu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>