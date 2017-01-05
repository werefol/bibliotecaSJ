<?php
	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'solicitudmp-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
        ),
		));
?>


	<div id="form">
		<fieldset>

<?php if ($tipo == 1) {?>

			<legend>Datos del Usuario</legend>

			<div class="alert alert-info"><i class="icon-info-sign"></i> Los campos con <span class="required">*</span> son obligatorios.</div>

			<div class="row">
				<div class="span4">
					<?php echo $form->textFieldRow($model, 'nombres'); ?>
				</div>
				<div class="span4">
					<?php echo $form->textFieldRow($model, 'apellidos'); ?>
				</div>
				<div class="span3">
					<?php echo $form->textFieldRow($model, 'cedula'); ?>
				</div>
			</div>

			<br>

			<div class="row">
				<div class="span4">
					<?php echo $form->textFieldRow($model, 'telefono'); ?>
				</div>
				<div class="span7">
					<?php echo $form->textFieldRow($model, 'correo', array('class'=>'span7')); ?>
				</div>
			</div>
			<br><br>

			<legend>Datos de inicio de sesión</legend>
			<div class="row">
				<div class="span3">
					<?php echo $form->textFieldRow($model, 'username'); ?>
				</div>
				<div class="span4">
					<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span4')); ?>
				</div>
				<div class="span4">
					<?php echo CHtml::label('Repetir Contraseña', 'Contraseña'); ?>
					<?php echo CHtml::passwordField('Contraseña', '', array('class'=>'span4')); ?>
					<?php echo CHtml::hiddenField('tipo', '1'); ?>
				</div>
			</div>

<?php }elseif ($tipo == 2) {?>
	
			<legend>Datos del Estudiante</legend>

			<div class="alert alert-info"><i class="icon-info-sign"></i> Los campos con <span class="required">*</span> son obligatorios.</div>

			<div class="row">
				<div class="span4">
					<?php echo $form->textFieldRow($model, 'nombres'); ?>
				</div>
				<div class="span4">
					<?php echo $form->textFieldRow($model, 'apellidos'); ?>
				</div>
				<div class="span3">
					<?php echo $form->textFieldRow($model, 'cedula'); ?>
				</div>
			</div>

			<br>

			<div class="row">
				<div class="span4">
					<?php echo $form->textFieldRow($model, 'telefono'); ?>
				</div>
				<div class="span7">
					<?php echo $form->textFieldRow($model, 'correo', array('class'=>'span7')); ?>
				</div>
			</div>

			<br>

			<div class="row">
				<div class="span4">
					<?php echo $form->labelEx($model, 'semestre'); ?>
					<?php echo $form->dropDownList($model, 'semestre', array('0'=>'1',
																			'1'=>'2',
																			'2'=>'3',
																			'3'=>'4',
																			'4'=>'5',
																			'5'=>'6',
																			'6'=>'7',
																			'7'=>'8',
																			'8'=>'9',
																			'9'=>'10',), array('prompt'=>'Seleccione', 'class'=>'input-small')); ?>
				</div>
				<div class="span7">
					<?php echo $form->labelEx($model,'interno'); ?>
					<?php echo $form->checkBox($model,'interno', array('value'=>1, 'uncheckValue'=>0)); ?>
					<?php/* echo CHtml::checkBox('check_interno','1');*/ ?>
					<?php echo CHtml::hiddenField('tipo', '2'); ?>
				</div>
			</div>

<?php }else{?>

			<legend>Datos del Docente</legend>

			<div class="alert alert-info"><i class="icon-info-sign"></i> Los campos con <span class="required">*</span> son obligatorios.</div>

			<div class="row">
				<div class="span4">
					<?php echo $form->textFieldRow($model, 'nombres'); ?>
				</div>
				<div class="span4">
					<?php echo $form->textFieldRow($model, 'apellidos'); ?>
				</div>
				<div class="span3">
					<?php echo $form->textFieldRow($model, 'cedula'); ?>
				</div>
			</div>

			<br>

			<div class="row">
				<div class="span4">
					<?php echo $form->textFieldRow($model, 'telefono'); ?>
				</div>
				<div class="span7">
					<?php echo $form->textFieldRow($model, 'correo', array('class'=>'span7')); ?>
				</div>
			</div>

<?php } ?>
	
	<br><br>
	<?php $this->widget('bootstrap.widgets.TbButton',
			        	array(
							'buttonType' => 'submit',
							'type' => 'info',
				            'icon'=>'icon-ok icon-white',
				            'label' => 'Guardar registro',
							'htmlOptions' => array(
											'id' => 'btn-guardar',
											),
						)
		);?>


		</fieldset>
	</div>

<?php $this->endWidget(); ?>



<?php /*$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'datos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nombres',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'apellidos',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'cedula',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'telefono',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'correo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->checkBoxRow($model,'interno'); ?>

	<?php echo $form->textFieldRow($model,'semestre',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_tipo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_status',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'username',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'password',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->checkBoxRow($model,'borrado'); ?>

	<?php echo $form->textFieldRow($model,'fecha_registro',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>-->

<?php $this->endWidget(); */?>
