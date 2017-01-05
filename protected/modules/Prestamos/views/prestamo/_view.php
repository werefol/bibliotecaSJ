<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_prestador')); ?>:</b>
	<?php echo CHtml::encode($data->id_prestador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_solicitante')); ?>:</b>
	<?php echo CHtml::encode($data->id_solicitante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipoprestamo')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipoprestamo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_receptor')); ?>:</b>
	<?php echo CHtml::encode($data->id_receptor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_prestamo')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_prestamo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_entrega')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_entrega); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('renovacion')); ?>:</b>
	<?php echo CHtml::encode($data->renovacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('borrado')); ?>:</b>
	<?php echo CHtml::encode($data->borrado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_status')); ?>:</b>
	<?php echo CHtml::encode($data->id_status); ?>
	<br />

	*/ ?>

</div>