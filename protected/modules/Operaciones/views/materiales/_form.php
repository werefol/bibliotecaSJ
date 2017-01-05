<?php
	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'materiales-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
        ),
		));
?>


	<div id="form" align="center">

	<?php if(Yii::app()->user->hasFlash('error')):?>
	    	<div class="alert alert-error">
	        	<i class="icon-remove"></i> <?php echo Yii::app()->user->getFlash('error'); ?>
	    	</div>
	<?php endif; ?>

	<?php echo $form->labelEx($model, 'id_tipomat'); ?>
	<?php echo $form->dropDownList($model, 'id_tipomat', CHtml::listData(TipoMaterial::model()->findAll(array('order'=>'tipo ASC')), 'id', 'tipo'), array('prompt'=>'Seleccione', 'class'=>'input-medium')); ?>
	
		<div id="datos_mat" align="center">
			<fieldset>
				<legend id="titulo_form">Datos del Libro</legend>

				<div class="alert alert-info"><i class="icon-info-sign"></i> Los campos con <span class="required">*</span> son obligatorios.</div>

				<div class="row">
					<div id="titulo" class="span4">
						<?php echo $form->textFieldRow($model, 'titulo'); ?>
					</div>
					<div id="autor" class="span4">
						<?php echo $form->textFieldRow($model, 'autor'); ?>
					</div>
					<div id="cota" class="span3">
						<?php echo $form->textFieldRow($model, 'cota'); ?>
					</div>
					<div id="anio" class="span4">
						<?php echo $form->textFieldRow($model, 'anio'); ?>
					</div>
					<div id="editorial" class="span4">
						<?php echo $form->labelEx($model, 'editorial'); ?>
						<?php echo $form->textField($model, 'editorial'); ?>
					</div>
					<div id="edicion" class="span3">
						<?php echo $form->textFieldRow($model, 'edicion'); ?>
					</div>
					<div id="issn" class="span4">
						<?php echo $form->textFieldRow($model, 'issn'); ?>
					</div>
					<div id="dlegal" class="span3">
						<?php echo $form->textFieldRow($model, 'deposito_legal'); ?>						
					</div>
					<div id="pais" class="span4">
						<?php echo $form->textFieldRow($model, 'pais'); ?>
					</div>
					<div id="subtitulo" class="span4">
						<?php echo $form->textFieldRow($model, 'subtitulo'); ?>
					</div>
				</div>

				
				<br>

				<div class="row">
					<div id="tutor" class="span4">
						<?php echo $form->textFieldRow($model, 'tutor'); ?>
					</div>
					<div id="mencion" class="span4">
						<?php echo $form->textFieldRow($model, 'mencion'); ?>						
					</div>
				</div>

				<br>

				<div class="row">
					
					<div id="volumen" class="span4">
							<?php echo $form->labelEx($model, 'volumen'); ?>
							<?php echo $form->dropDownList($model, 'volumen', array('0'=>'1',
																					'1'=>'2',
																					'2'=>'3',
																					'3'=>'4',
																					'4'=>'5',
																					'5'=>'6',
																					'6'=>'7',
																					'7'=>'8',
																					'8'=>'9',
																					'9'=>'10',), array('prompt'=>'Seleccione', 'class'=>'input-medium')); ?>
					</div>
					<div id="tomo" class="span4">
							<?php echo $form->labelEx($model, 'tomo'); ?>
							<?php echo $form->dropDownList($model, 'tomo', array('0'=>'1',
																					'1'=>'2',
																					'2'=>'3',
																					'3'=>'4',
																					'4'=>'5',
																					'5'=>'6',
																					'6'=>'7',
																					'7'=>'8',
																					'8'=>'9',
																					'9'=>'10',), array('prompt'=>'Seleccione', 'class'=>'input-medium')); ?>
					</div>
					<div id="cantidad" class="span3">
						<?php echo $form->labelEx($model, 'cantidad'); ?>
						<?php echo $form->dropDownList($model, 'cantidad', array('0'=>'1',
																				'1'=>'2',
																				'2'=>'3',
																				'3'=>'4',
																				'4'=>'5',
																				'5'=>'6',
																				'6'=>'7',
																				'7'=>'8',
																				'8'=>'9',
																				'9'=>'10',), array('selected'=>'1', 'class'=>'input-small')); ?>
					</div>
				</div>
		
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
	</div>

<?php $this->endWidget(); ?>

<?php Yii::app()->clientScript->registerScript('cargarCampos','

$(document).ready(function(){
	
	
	var formulario = $("#datos_mat");
	var select = $("#'.CHtml::activeId($model,'id_tipomat').'");

	formulario.hide();

	select.change(function(){

		var valor = $("#'.CHtml::activeId($model,'id_tipomat').'").val();
		var opcion = $("#'.CHtml::activeId($model,'id_tipomat').' option:selected").html();

		//alert("Select cambió " + opcion + " " + valor);
		$("#titulo_form").html("Datos del " + opcion);
		formulario.show(0500);
		
		if (valor == 1) {			
			
			$("#titulo").show(0500);
			$("#autor").show(0500);
			$("#cota").show(0500);
			$("#anio").show(0500);
			$("#editorial").show(0500);
			$("#edicion").show(0500);
			$("#issn").hide(0500);
			$("#dlegal").hide(0500);
			$("#pais").show(0500);
			$("#volumen").show(0500);
			$("#tomo").show(0500);
			$("#tutor").hide(0500);
			$("#mencion").hide(0500);
			$("#subtitulo").show(0500);
			$("#cantidad").show(0500);

			//Limpiar campos
			$("#'.CHtml::activeId($model,'titulo').'").val("");
			$("#'.CHtml::activeId($model,'autor').'").val("");
			$("#'.CHtml::activeId($model,'cota').'").val("");
			$("#'.CHtml::activeId($model,'anio').'").val("");
			$("#'.CHtml::activeId($model,'editorial').'").val("");
			$("#'.CHtml::activeId($model,'edicion').'").val("");
			$("#'.CHtml::activeId($model,'issn').'").val("");
			$("#'.CHtml::activeId($model,'deposito_legal').'").val("");
			$("#'.CHtml::activeId($model,'pais').'").val("");
			$("#'.CHtml::activeId($model,'volumen').'").val("");
			$("#'.CHtml::activeId($model,'tomo').'").val("");
			$("#'.CHtml::activeId($model,'tutor').'").val("");
			$("#'.CHtml::activeId($model,'mencion').'").val("");
			$("#'.CHtml::activeId($model,'subtitulo').'").val("");
			$("#'.CHtml::activeId($model,'cantidad').' option:eq(0)").prop("selected", true);
		
		}else{
			if (valor == 2) {
				
				$("#titulo").show(0500);
				$("#autor").show(0500);
				$("#cota").show(0500);
				$("#anio").show(0500);
				$("#editorial").hide(0500);
				$("#edicion").hide(0500);
				$("#issn").show(0500);
				$("#dlegal").show(0500);
				$("#pais").show(0500);
				$("#volumen").show(0500);
				$("#tomo").hide(0500);
				$("#tutor").hide(0500);
				$("#mencion").hide(0500);
				$("#subtitulo").hide(0500);
				$("#cantidad").show(0500);

				//Limpiar campos
				$("#'.CHtml::activeId($model,'titulo').'").val("");
				$("#'.CHtml::activeId($model,'autor').'").val("");
				$("#'.CHtml::activeId($model,'cota').'").val("");
				$("#'.CHtml::activeId($model,'anio').'").val("");
				$("#'.CHtml::activeId($model,'editorial').'").val("");
				$("#'.CHtml::activeId($model,'edicion').'").val("");
				$("#'.CHtml::activeId($model,'issn').'").val("");
				$("#'.CHtml::activeId($model,'deposito_legal').'").val("");
				$("#'.CHtml::activeId($model,'pais').'").val("");
				$("#'.CHtml::activeId($model,'volumen').'").val("");
				$("#'.CHtml::activeId($model,'tomo').'").val("");
				$("#'.CHtml::activeId($model,'tutor').'").val("");
				$("#'.CHtml::activeId($model,'mencion').'").val("");
				$("#'.CHtml::activeId($model,'subtitulo').'").val("");
				$("#'.CHtml::activeId($model,'cantidad').' option:eq(0)").prop("selected", true);
				
			}else{
				if (valor == 3) {
					
					$("#titulo").show(0500);
					$("#autor").show(0500);
					$("#cota").show(0500);
					$("#anio").hide(0500);
					$("#editorial").hide(0500);
					$("#edicion").hide(0500);
					$("#issn").hide(0500);
					$("#dlegal").hide(0500);
					$("#pais").hide(0500);
					$("#volumen").hide(0500);
					$("#tomo").hide(0500);
					$("#tutor").show(0500);
					$("#mencion").show(0500);
					$("#subtitulo").hide(0500);
					$("#cantidad").hide(0500);

					//Limpiar campos
					$("#'.CHtml::activeId($model,'titulo').'").val("");
					$("#'.CHtml::activeId($model,'autor').'").val("");
					$("#'.CHtml::activeId($model,'cota').'").val("");
					$("#'.CHtml::activeId($model,'anio').'").val("");
					$("#'.CHtml::activeId($model,'editorial').'").val("");
					$("#'.CHtml::activeId($model,'edicion').'").val("");
					$("#'.CHtml::activeId($model,'issn').'").val("");
					$("#'.CHtml::activeId($model,'deposito_legal').'").val("");
					$("#'.CHtml::activeId($model,'pais').'").val("");
					$("#'.CHtml::activeId($model,'volumen').'").val("");
					$("#'.CHtml::activeId($model,'tomo').'").val("");
					$("#'.CHtml::activeId($model,'tutor').'").val("");
					$("#'.CHtml::activeId($model,'mencion').'").val("");
					$("#'.CHtml::activeId($model,'subtitulo').'").val("");
					$("#'.CHtml::activeId($model,'cantidad').'").val("");

				}else{
					if (valor == 4) {
						
						$("#titulo").show(0500);
						$("#autor").show(0500);
						$("#cota").show(0500);
						$("#anio").show(0500);
						$("#editorial").show(0500);
						$("#edicion").show(0500);
						$("#issn").hide(0500);
						$("#dlegal").hide(0500);
						$("#pais").show(0500);
						$("#volumen").show(0500);
						$("#tomo").show(0500);
						$("#tutor").hide(0500);
						$("#mencion").hide(0500);
						$("#subtitulo").show(0500);
						$("#cantidad").show(0500);

						//Limpiar campos
						$("#'.CHtml::activeId($model,'titulo').'").val("");
						$("#'.CHtml::activeId($model,'autor').'").val("");
						$("#'.CHtml::activeId($model,'cota').'").val("");
						$("#'.CHtml::activeId($model,'anio').'").val("");
						$("#'.CHtml::activeId($model,'editorial').'").val("");
						$("#'.CHtml::activeId($model,'edicion').'").val("");
						$("#'.CHtml::activeId($model,'issn').'").val("");
						$("#'.CHtml::activeId($model,'deposito_legal').'").val("");
						$("#'.CHtml::activeId($model,'pais').'").val("");
						$("#'.CHtml::activeId($model,'volumen').'").val("");
						$("#'.CHtml::activeId($model,'tomo').'").val("");
						$("#'.CHtml::activeId($model,'tutor').'").val("");
						$("#'.CHtml::activeId($model,'mencion').'").val("");
						$("#'.CHtml::activeId($model,'subtitulo').'").val("");
						$("#'.CHtml::activeId($model,'cantidad').' option:eq(0)").prop("selected", true);
					
					}else{
						if (valor == 5) {
							
							$("#titulo").show(0500);
							$("#autor").show(0500);
							$("#cota").show(0500);
							$("#anio").hide(0500);
							$("#editorial").hide(0500);
							$("#edicion").hide(0500);
							$("#issn").hide(0500);
							$("#dlegal").hide(0500);
							$("#pais").hide(0500);
							$("#volumen").hide(0500);
							$("#tomo").hide(0500);
							$("#tutor").show(0500);
							$("#mencion").show(0500);
							$("#subtitulo").hide(0500);
							$("#cantidad").hide(0500);

							//Limpiar campos
							$("#'.CHtml::activeId($model,'titulo').'").val("");
							$("#'.CHtml::activeId($model,'autor').'").val("");
							$("#'.CHtml::activeId($model,'cota').'").val("");
							$("#'.CHtml::activeId($model,'anio').'").val("");
							$("#'.CHtml::activeId($model,'editorial').'").val("");
							$("#'.CHtml::activeId($model,'edicion').'").val("");
							$("#'.CHtml::activeId($model,'issn').'").val("");
							$("#'.CHtml::activeId($model,'deposito_legal').'").val("");
							$("#'.CHtml::activeId($model,'pais').'").val("");
							$("#'.CHtml::activeId($model,'volumen').'").val("");
							$("#'.CHtml::activeId($model,'tomo').'").val("");
							$("#'.CHtml::activeId($model,'tutor').'").val("");
							$("#'.CHtml::activeId($model,'mencion').'").val("");
							$("#'.CHtml::activeId($model,'subtitulo').'").val("");
							$("#'.CHtml::activeId($model,'cantidad').'").val("");
						
						}else{
							if (valor === "") {

								formulario.hide(0500);
								
								//Limpiar campos
								$("#'.CHtml::activeId($model,'titulo').'").val("");
								$("#'.CHtml::activeId($model,'autor').'").val("");
								$("#'.CHtml::activeId($model,'cota').'").val("");
								$("#'.CHtml::activeId($model,'anio').'").val("");
								$("#'.CHtml::activeId($model,'editorial').'").val("");
								$("#'.CHtml::activeId($model,'edicion').'").val("");
								$("#'.CHtml::activeId($model,'issn').'").val("");
								$("#'.CHtml::activeId($model,'deposito_legal').'").val("");
								$("#'.CHtml::activeId($model,'pais').'").val("");
								$("#'.CHtml::activeId($model,'volumen').'").val("");
								$("#'.CHtml::activeId($model,'tomo').'").val("");
								$("#'.CHtml::activeId($model,'tutor').'").val("");
								$("#'.CHtml::activeId($model,'mencion').'").val("");
								$("#'.CHtml::activeId($model,'subtitulo').'").val("");
								$("#'.CHtml::activeId($model,'cantidad').'").val("");
							}
						}
					}
				}
			}
		}
	});
});

',CClientScript::POS_HEAD); ?>





<?php /* $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'materiales-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textAreaRow($model,'cota',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'autor',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'anio',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'editorial',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'edicion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'volumen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tomo',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'tutor',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'id_tipomat',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'titulo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'pais',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'subtitulo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'issn',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'deposito_legal',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'mencion',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->checkBoxRow($model,'borrado'); ?>

	<?php echo $form->textFieldRow($model,'fecha_registro',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cantidad',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); */ ?>
