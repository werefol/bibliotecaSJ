<?php
	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'prestamo-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
        'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
        ),
		));
?>


	<div id="form" class="row">
		<fieldset>  <!--Datos del Solicitante-->
			<legend style=" font-size: 17px;"><b>Datos del solicitante</b></legend>            
			<table class="table table-bordered">
		        <tr>
		            <td style="width: 25%"><b><?php echo $form->labelEx($model,'cedula'); ?></b></td>
		            <td style="width: 25%">

					<div class="input-append">
						<b><?php echo $form->textField($model,'cedula',array('maxlength'=>'9')); ?></b>
						<?php $this->widget('bootstrap.widgets.TbButton',
				        	array(
								'buttonType' => 'button',
								'type' => 'primary',
					            'icon'=>'icon-search icon-white',
								'htmlOptions' => array(
												'onclick' => 'datosSolicitante()',
												'id' => 'btn-datos',											
												'title' => 'Buscar Solicitante',
												),
							)
				    	);?>
					</div>
		             
		                                    <div id="mensajesSistem"  class="datosPersonales"></div>
		                                    <?php echo $form->error($model, "cedula"); ?></td>
		            <td style="width: 20%"><b>Nombres y apellidos</b></td>
		            <td style="width: 30%"><div id="nombres_apellidos" class="datosPersonales"></div></td>
		        </tr>
		        <tr>
		            <td><b>Tel&eacute;fono</b></td>
		            <td><div id="telefono" class="datosPersonales"></div></td>
		            <td><b>Correo</b></td>
		            <td><div id="correo" class="datosPersonales"></div></td>
		        </tr>
		        <tr>
		            <td><b>¿Interno?</b></td>
		            <td><div id="interno" class="datosPersonales"></div></td>
		            <td><b>Semestre</b></td>
		            <td><div id="semestre" class="datosPersonales"></div></td>
		        </tr>
		        <tr>
		            <td><b>Fecha de Registro</b></td>
		            <td><div id="fecha_registro" class="datosPersonales"></div></td>
		            <td><b>Estado</b></td>
		            <td><div id="estado" class="datosPersonales"></div></td>
		        </tr>	        
		    </table>
		</fieldset> <!--fin datos del solicitante-->

			<div id="cant_materiales" class="row" align="center">

				<?php echo CHtml::label('Cantidad de materiales para el prestamo(max 3).', CHtml::activeId($materiales, 'cantidad')); ?>
				<?php echo $form->dropDownList($materiales, 'cantidad', array('0'=>'1',
																			'1'=>'2',
																			'2'=>'3'), array('prompt'=>'Seleccione', 'class'=>'input-medium')); ?>
			</div>
			<br><br>
		<div id="materiales">
			<!--Materiales-->
			<div id="material_1">

				<fieldset>  <!--Datos del Material-->
					<legend style=" font-size: 17px;"><b>Datos del Material</b></legend>            
					<div id="enter_cota" align="center">
						<div id="data-container">
							<div><b><?php echo CHtml::label('Cota','material1'); ?></b></div>
							<div class="input-append">
								<?php echo CHtml::textField('material1','',array('maxlength'=>'10')); ?>
											<?php $this->widget('bootstrap.widgets.TbButton',
									        	array(
													'buttonType' => 'button',
													'type' => 'primary',
										            'icon'=>'icon-search icon-white',
													'htmlOptions' => array(
																	'onclick' => 'buscarMaterial()',
																	'id' => 'btn-material',
																	'title' => 'Buscar Material',
																	),
												)
									    	);?>
							</div>
							             
							    <div id="mensajesSistema"  class="materialData"></div>
						</div>
					</div>
					<br>				    
				    <div id="tabla-mat1"></div>
				</fieldset> <!--fin datos del material-->
			</div>

			<br><br>

			<div id="material_2">
				<fieldset>  <!--Datos del Material-->
					<legend style=" font-size: 17px;"><b>Datos del 2do Material</b></legend>            
					<div id="enter_cota2" align="center">
						<div id="data-container">
							<div><b><?php echo CHtml::label('Cota','material2'); ?></b></div>
							<div class="input-append">
								<?php echo CHtml::textField('material2','',array('maxlength'=>'10')); ?>
											<?php $this->widget('bootstrap.widgets.TbButton',
									        	array(
													'buttonType' => 'button',
													'type' => 'primary',
										            'icon'=>'icon-search icon-white',
													'htmlOptions' => array(
																	'id' => 'btn-material2',
																	'title' => 'Buscar Material',
																	),
												)
									    	);?>
							</div>
							             
							<div id="mensajesSistema2"  class="materialData2"></div>
						</div>
					</div>
					<br>
					<div id="tabla-mat2"></div>
				</fieldset> <!--fin datos del material-->
			</div>

			<br><br>
			
			<div id="material_3">
				<fieldset>  <!--Datos del Material-->
					<legend style=" font-size: 17px;"><b>Datos del 3er Material</b></legend>            
					<div id="enter_cota3" align="center">
						<div id="data-container">
							<div><b><?php echo CHtml::label('Cota','material3'); ?></b></div>
							<div class="input-append">
								<?php echo CHtml::textField('material3','',array('maxlength'=>'10')); ?>
											<?php $this->widget('bootstrap.widgets.TbButton',
									        	array(
													'buttonType' => 'button',
													'type' => 'primary',
										            'icon'=>'icon-search icon-white',
													'htmlOptions' => array(
																	'id' => 'btn-material3',
																	'title' => 'Buscar Material',
																	),
												)
									    	);?>
							</div>
							             
							    <div id="mensajesSistema3"  class="materialData3"></div>
						</div>
					</div>
					<br>
					<div id="tabla-mat3"></div>
				</fieldset> <!--fin datos del material-->
			</div>
		</div>

		<div id="data-prestamo">	
			<table id="datos-prestamo" class="table">
				<tr>
					<td colspan="2">
						<div id="prestador" align="center">
							<h4>Prestado por:</h4>
								<?php 
									$datos = Datos::model()->findAll('id_tipo=1 and borrado=FALSE');
									$data = array();

									foreach ($datos as $dato)
									$data[$dato->id] = $dato->nombres . ' '. $dato->apellidos;
								?>
							<?php echo $form->dropDownList($modelDatos, 'id', $data, array('prompt'=>'Seleccione')); ?>
						</div>
						<br>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div id="tipo_prestamo" align="center">
							<h4>Tipo de Prestamo</h4>
							<div class="span6">
							<?php echo CHtml::label('Sala', ''); ?>
							<?php echo $form->radioButton($model, 'id_tipoprestamo', array('value'=>1, 'uncheckvalue'=>null)); ?>
							</div>
							<div class="span5">	
							<?php echo CHtml::label('Circulante', ''); ?>
							<?php echo $form->radioButton($model, 'id_tipoprestamo', array('value'=>2, 'uncheckvalue'=>null)); ?>
							</div>	
							</div>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
							<?php echo $form->textFieldRow($model,'fecha_prestamo', array('readonly'=>true, 'value'=>date("d-m-Y"),)); ?>
					</td>
					<td style="text-align: center;">
							<?php echo $form->labelEx($model, 'fecha_entrega'); ?>
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					                                        'model' => $model,
					                                        'attribute' => 'fecha_prestamo',
					                                        'value' => $model->fecha_prestamo,
					                                        'language' => 'es',
					                                        'htmlOptions' => array('readonly' => "readonly", 'class' => 'input-large', 'id'=>'fprestamo'),
					                                        //additional javascript options for the date picker plugin
					                                        'options' => array(
					                                            'autoSize' => true,
					                                            // 'defaultDate'=>$model->fechanacimiento,
					                                            //'dateFormat'=>'yy-m-d',
					                                            'dateFormat' => 'dd-mm-yy',
					                                            'buttonImage' => Yii::app()->baseUrl . '/images/calendario.png',
					                                            'buttonImageOnly' => true,
					                                            'buttonText' => 'Escoger fecha',
					                                            'selectOtherMonths' => true,
					                                            'showAnim' => 'slide',
					                                            'showButtonPanel' => true,
					                                            'showOn' => 'button',
					                                            'changeMonth' => 'true',
					                                            'changeYear' => 'true',
					                                            'yearRange' => "1900:+nn",
					                                            'maxDate'=> 5,
					                                            'minDate'=> 0,
					                                        ),
					                                    )); ?>
					</td>
				</tr>
			</table>

			<div id="ventana_modal">
				<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'consultaPass')); ?>
	 
					<div class="modal-header">
					    <a class="close" data-dismiss="modal">&times;</a>
					    <h4>Modal header</h4>
					</div>
					 
					<div class="modal-body">
					    <p>One fine body...</p>
					</div>
					 
					<div class="modal-footer">
					    <?php $this->widget('bootstrap.widgets.TbButton', array(
					        'type'=>'primary',
					        'label'=>'Save changes',
					        'url'=>'#',
					        'htmlOptions'=>array('data-dismiss'=>'modal'),
					    )); ?>
					    <?php $this->widget('bootstrap.widgets.TbButton', array(
					        'label'=>'Close',
					        'url'=>'#',
					        'htmlOptions'=>array('data-dismiss'=>'modal'),
					    )); ?>
					</div>
				 
				<?php $this->endWidget(); ?>

				<?php $this->widget('bootstrap.widgets.TbButton', array(
				    'label'=>'Mostrar modal',
				    'type'=>'inverse',
				    'htmlOptions'=>array(
				        'data-toggle'=>'modal',
				        'data-target'=>'#consultaPass',
				        'id'=>'btn-modal',
				    ),
				)); ?>

			</div>

			<br><br>
			<?php $this->widget('bootstrap.widgets.TbButton',
					        	array(
									'buttonType' => 'submit',
									'type' => 'info',
						            'icon'=>'icon-ok icon-white',
						            'label' => 'Guardar Prestamo',
									'htmlOptions' => array(
													'id' => 'btn-guardar',
													),
								)
			);?>
		</div>
	</div>

<?php $this->endWidget(); ?>

<?php Yii::app()->clientScript->registerScript('datosPrestamo', '

	$(document).ready(function(){

		/*$("#cant_materiales").hide();
		$("#materiales").hide();
		$("#material_1").hide();
		$("#material_2").hide();
		$("#material_3").hide();
		$("#tabla-mat1").hide();
		$("#tabla-mat2").hide();
		$("#tabla-mat3").hide();*/
		var select = $("#'.CHtml::activeId($materiales,'cantidad').'");
		var prestador = $("#'.CHtml::activeId($modelDatos,'id').'");

		select.change(function(){
			
			var cantidad = $("#'.CHtml::activeId($materiales, 'cantidad').'").val();
			alert(cantidad);

			if (cantidad === "0") {

				$("#materiales").show(0500);
				$("#material_1").show(0500);			
				$("#material_2").hide(0500);
				$("#material_3").hide(0500);

				$("#tabla-mat2").html("");
				$("#tabla-mat3").html("");

				$("#material2").val("");
				$("#material3").val("");

			}else{
				if (cantidad == 1) {

					$("#materiales").show(0500);
					$("#material_1").show(0500);			
					$("#material_2").show(0500);
					$("#material_3").hide(0500);

					$("#tabla-mat3").html("");

					$("#material3").val("");				
				}else{
					if (cantidad == 2) {

						$("#materiales").show(0500);
						$("#material_1").show(0500);			
						$("#material_2").show(0500);
						$("#material_3").show(0500);
					}else{
						if (cantidad == "") {
							
							$("#materiales").hide(0500);
							$("#material_1").hide(0500);
							$("#material_2").hide(0500);
							$("#material_3").hide(0500);

							$("#tabla-mat1").html("");
							$("#tabla-mat2").html("");
							$("#tabla-mat3").html("");

							limpiarCota();
						}
					}
				}
			}
		});

		prestador.change(function(){
			
			var modal = $("#consultaPass");
			var valor_p = $("#btn-modal").click();

			if ($(this).val() == 0 || $(this).val() == "") {
				
				 modal.hide();
			}else{


			modal.toggle();
			}
		});
	});


	function datosSolicitante(){

		var cedula = $("#'.CHtml::activeId($model,'cedula').'").val();
		var select = $("#'.CHtml::activeId($materiales,'cantidad').'");

		if ($.isNumeric(cedula) && cedula>=1) {					

                        $.ajax({

                                url:"'.CController::createUrl('DatosSolicitante').'",
                                cache: false,
                                type: "POST",
                                dataType: "json",
                                data: ({cedula:cedula}),
                                beforeSend: function(xkr){
                                        $(".datosPersonales").html("");
                            			$("#mensajesSistem").html("");                                          
                                        },

                                success: function(data){
                                    
                                    if(data.error==0) {

                                            $("#nombres_apellidos").html(data.nombre_completo);
		                                    $("#telefono").html(data.telefono);
		                                    $("#correo").html(data.correo);
		                                    $("#interno").html(data.interno);
		                                    $("#semestre").html(data.semestre);
		                                    $("#fecha_registro").html(data.fecha_registro);
		                                    $("#estado").html(data.estado);
		                                    $("#cant_materiales").show(0500);
		                                             
                                    }else{
										$("#mensajesSistem").html(data.msg_error);
										$("#cant_materiales").hide(0500);
										select.val("");

                                	}
                                }

                        });
                }
                else{

                	$("#msg_error").html("");
                }
	}

	function buscarMaterial(){		
		
		var btns = $("#materiales :button")
		var btn_1 = $("#btn-material");
		var btn_2 = $("#btn-material2");
		var btn_3 = $("#btn-material3");

		
		btn_1.click(function() {
			
			var material = $("#material1").val();

			if (material && material!=="") {
				
				$.ajax({
	                    url:"'.CController::createUrl('DatosMaterial').'",
	                    cache: false,
	                    type: "POST",
	                    dataType: "json",
	                    data: ({material:material}),
	                    beforeSend: function(xkr){
	                                    $("#mensajesSistema").html("");
	                            		$(".materialData").html("");                                          
	                                },

	                    success: function(data){
	                                    
	                        		if(data.error==0) {                                            

			                            $("#tabla-mat1").html(data.tabla);
			                            $("#tabla-mat1").show(0500);
			                                             
	                                }else{
										$("#mensajesSistema").html(data.msg_error);
										$("#tabla-mat1").hide(0500);
	                                }
	                            }

	            });
			}
		});

		btn_2.click(function() {
			
			var material = $("#material2").val();

			if (material && material!=="") {
				
				$.ajax({
	                    url:"'.CController::createUrl('DatosMaterial').'",
	                    cache: false,
	                    type: "POST",
	                    dataType: "json",
	                    data: ({material:material}),
	                    beforeSend: function(xhr){
	                                    $("#mensajesSistema2").html("");
	                            		$(".materialData2").html("");                                          
	                                },

	                    success: function(data){
	                                    
	                        		if(data.error == 0) {                                            

			                            $("#tabla-mat2").html(data.tabla);
			                            $("#tabla-mat2").show(0500);
			                                             
	                                }else{
										$("#mensajesSistema2").html(data.msg_error);
										$("#tabla-mat2").hide(0500);
	                                }
	                            }

	            });
			}
		});

		btn_3.click(function() {
			
			var material = $("#material3").val();

			if (material && material!=="") {
				
				$.ajax({
	                    url:"'.CController::createUrl('DatosMaterial').'",
	                    cache: false,
	                    type: "POST",
	                    dataType: "json",
	                    data: ({material:material}),
	                    beforeSend: function(xkr){
	                                    $("#mensajesSistema3").html("");
	                            		$(".materialData3").html("");                                          
	                                },

	                    success: function(data){
	                                    
	                        		if(data.error==0) {                                            

			                            $("#tabla-mat3").html(data.tabla);
			                            $("#tabla-mat3").show(0500);
			                                             
	                                }else{
										$("#mensajesSistema3").html(data.msg_error);
										$("#tabla-mat3").hide(0500);
	                                }
	                            }

	            });
			}
		});
	}

	function limpiarCota(){
		
		$("#material1").val("");
		$("#material2").val("");
		$("#material3").val("");
	}

',CClientScript::POS_HEAD); ?>


<?php /*$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'prestamo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); */?>
