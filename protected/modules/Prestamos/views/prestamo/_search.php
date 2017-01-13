<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_prestador',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_solicitante',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_tipoprestamo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_receptor',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_prestamo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fecha_entrega',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'renovacion'); ?>

	<?php echo $form->checkBoxRow($model,'borrado'); ?>

	<?php echo $form->textFieldRow($model,'id_status',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
