<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sol')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_sol),array('view','id'=>$data->id_sol)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ci_sol')); ?>:</b>
	<?php echo CHtml::encode($data->ci_sol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_sol')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_sol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_sol')); ?>:</b>
	<?php echo CHtml::encode($data->apellido_sol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_sol')); ?>:</b>
	<?php echo CHtml::encode($data->telefono_sol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correo_sol')); ?>:</b>
	<?php echo CHtml::encode($data->correo_sol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semestre')); ?>:</b>
	<?php echo CHtml::encode($data->semestre); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('externo')); ?>:</b>
	<?php echo CHtml::encode($data->externo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_sol')); ?>:</b>
	<?php echo CHtml::encode($data->status_sol); ?>
	<br />

	*/ ?>

</div>