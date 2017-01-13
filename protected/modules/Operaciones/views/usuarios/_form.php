<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
)); ?>





<div class="contenedor">
	<div class="form-reg">
		<p class="help-block">Fields with <span class="required">*</span> are required.</p>
		<div class="form-fields">
			<?php echo $form->errorSummary($model); ?>

			<?php echo $form->textFieldRow($model,'ci_usu',array('class'=>'span3')); ?>

			<?php echo $form->textFieldRow($model,'nombre_usu',array('class'=>'span3')); ?>

			<?php echo $form->textFieldRow($model,'apellido_usu',array('class'=>'span3')); ?>

			<?php echo $form->textFieldRow($model,'telefono_usu',array('class'=>'span3')); ?>

			<?php echo $form->textFieldRow($model,'correo_usu',array('class'=>'span3')); ?>

			<?php echo $form->textFieldRow($model,'username',array('class'=>'span3')); ?>

			<?php echo $form->passwordFieldRow($model,'password',array('class'=>'span3')); ?>

			<?php echo $form->checkBoxRow($model,'status'); ?>
		</div>
	</div>
</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
