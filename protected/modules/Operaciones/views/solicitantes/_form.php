<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'solicitantes-form',
	'enableAjaxValidation'=>false,
)); ?>


<div class="contenedor">
	<div class="form-reg">
		<p class="help-block">Fields with <span class="required">*</span> are required.</p>
		<div class="form-fields">
			<?php echo $form->errorSummary($model); ?>

			<?php echo $form->textFieldRow($model,'ci_sol',array('class'=>'span3')); ?>

			<?php echo $form->textFieldRow($model,'nombre_sol',array('class'=>'span3','maxlength'=>30)); ?>

			<?php echo $form->textFieldRow($model,'apellido_sol',array('class'=>'span3','maxlength'=>30)); ?>

			<?php echo $form->textFieldRow($model,'telefono_sol',array('class'=>'span3')); ?>

			<?php echo $form->textFieldRow($model,'correo_sol',array('class'=>'span3')); ?>

			<?php echo $form->dropDownList($model,'semestre', array(
																''=>'Seleccione un semestre',
																'1'=>'1',
																'2'=>'2',
																'3'=>'3',
																'4'=>'4',
																'5'=>'5',
																'6'=>'6',
																'7'=>'7',
																'8'=>'8',
																'9'=>'9',
																'10'=>'10'
																), 
																array(
																'options'=> array(''=> array(
																						'selected'=>true)))); ?>


			<?php echo $form->checkBoxRow($model,'externo'); ?>

			<?php echo $form->checkBoxRow($model,'status_sol'); ?>
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
