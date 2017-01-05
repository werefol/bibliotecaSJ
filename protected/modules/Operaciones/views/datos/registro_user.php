<h3><center>Registrar Usuario</center></h3>

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

<fieldset>
	<legend>Datos de Usuario</legend>

	<div class="alert alert-info"><i class="icon-info-sign"></i> Los campos con <span class="required">*</span> son obligatorios.</div>

	<div class="row">
		<div>
			<?php echo $form->textFieldRow(); ?>
		</div>
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
</fieldset>

<?php $this->endWidget(); ?>