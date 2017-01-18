<h1><center><b>Realizar Prestamo</b></center></h1>

<br>
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

<div class="alert alert-info"><i class="icon-info-sign"></i> Los campos marcados con <span class="required">*</span> son obligatorios.</div>

<?php echo $form->errorSummary($model); ?>

<?php if(Yii::app()->user->hasFlash('error')):?>
            <div class="alert alert-error">
                <i class="icon-remove"></i> <?php echo Yii::app()->user->getFlash('error'); ?>
            </div>
<?php endif; ?>
<br>
<div id="form">
    <fieldset>
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
    </fieldset>
    <br>
        <div id="cant_materiales" class="row-fluid" align="center">
            <div id="contenedor-cantidad">
                <?php echo $form->labelEx($model,'cant_material'); ?>
                <?php echo $form->dropDownList($model, 'cant_material', array('1'=>'1',
                                                                                '2'=>'2',
                                                                                '3'=>'3'),
                                                                    array('prompt'=>'Seleccione',
                                                                            'class'=>'input-medium')
                                                );
                ?>
                <?php echo $form->error($model,'cant_material'); ?>
            </div>
        </div>
        <br><br>
    <div id="err_cotas"></div>
    <div id="contenedor-prestamo" class="container-fluid"><br>
        <div id="materiales">
            <div id="material_1" class="row-fluid" align="center">
                <fieldset class="span12 mtrls"><!--Datos del Material1-->
                    <legend class="span12 mtrs" style=" font-size: 17px;"><b>Datos del Material</b></legend>
                    
                        <div><?php echo $form->labelEx($materiales,'cota', array('for'=>'mat1')); ?></div>
                        <div>
                            <?php echo $form->textField($materiales,'cota',array('maxlength'=>'10', 'onchange'=>'buscarMaterial(1)', 'name'=>'Materiales[]', 'id'=>'mat1')); ?>
                            <?php echo $form->error($materiales,'cota'); ?>
                        </div>
                        <div id="ejemplar1">
                            <?php echo CHtml::label('Ejemplar(es)','ejemplar_1'); ?>
                            <?php echo $form->dropDownList($ejemplares, 'ejemplar', CHtml::listData(Ejemplares::model()->findAll(array('order'=>'ejemplar asc')),'id', 'ejemplar'), array('name'=>'ejemplares[]', 'id'=>'ejemplar_1')); ?>
                            <?php echo $form->error($ejemplares,'ejemplar'); ?>
                        </div>
                        <div id="mensajesSistema1"  class="materialData1"></div>
                        <br>                    
                        <div id="tabla-mat1" class="span9 offset1"></div>
                    
                </fieldset>
            </div><!--fin datos del material1-->

            <br>

            <div id="material_2" class="row-fluid" align="center">
                <fieldset class="mtrls"><!--Datos del Material2-->
                    <legend class="span12 mtrs" style=" font-size: 17px;"><b>Datos del Material</b></legend>
                    <div>
                        <div><?php echo $form->labelEx($materiales,'cota', array('for'=>'mat2')); ?></div>
                        <div>
                            <?php echo $form->textField($materiales,'cota',array('maxlength'=>'10', 'onchange'=>'buscarMaterial(2)', 'name'=>'Materiales[]', 'id'=>'mat2')); ?>
                        </div>
                        <div id="ejemplar2">
                            <?php echo CHtml::label('Ejemplar(es)','ejemplar_2'); ?>
                            <?php echo $form->dropDownList($ejemplares, 'ejemplar', CHtml::listData(Ejemplares::model()->findAll(array('order'=>'ejemplar asc')),'id', 'ejemplar'), array('name'=>'ejemplares[]', 'id'=>'ejemplar_2')); ?>         
                        </div>
                    <div id="mensajesSistema2"  class="materialData2"></div>
                    <br>                    
                    <div id="tabla-mat2" class="span9 offset1"></div>
                    </div>
                </fieldset>
            </div><!--fin datos del material2-->

            <br>

            <div id="material_3" class="row-fluid" align="center">
                <fieldset class="mtrls"><!--Datos del Material3-->
                    <legend class="span12 mtrs" style=" font-size: 17px;"><b>Datos del Material</b></legend>
                    <div>
                        <div><?php echo $form->labelEx($materiales,'cota', array('for'=>'mat3')); ?></div>
                        <div>
                            <?php echo $form->textField($materiales,'cota',array('maxlength'=>'10', 'onchange'=>'buscarMaterial(3)', 'name'=>'Materiales[]', 'id'=>'mat3')); ?>
                        </div>
                        <div id="ejemplar3">
                            <?php echo CHtml::label('Ejemplar(es)','ejemplar_3'); ?>
                            <?php echo $form->dropDownList($ejemplares, 'ejemplar', CHtml::listData(Ejemplares::model()->findAll(array('order'=>'ejemplar asc')),'id', 'ejemplar'), array('name'=>'ejemplares[]', 'id'=>'ejemplar_3')); ?>         
                        </div>
                    <div id="mensajesSistema3"  class="materialData3"></div>
                    <br>                    
                    <div id="tabla-mat3" class="span9 offset1"></div>
                    </div>
                </fieldset>
            </div><!--fin datos del material3-->
        </div><!--Fin seccion materiales-->

        <br>
        
        <div id="prestamo_data">
            <div id="usuarios" class="row-fluid" align="center">
                <legend class="span12 mtrs" style=" font-size: 17px;"><b>Usuarios</b></legend>
                <div>
                <?php 
                    $datos = Datos::model()->findAll('id_tipo=1 and borrado=FALSE');
                    $data = array();

                    foreach ($datos as $dato)
                        $data[$dato->id] = $dato->nombres . ' '. $dato->apellidos;
                ?>
                <?php echo $form->labelEx($model, 'id_prestador'); ?>
                <?php echo $form->dropDownList($model, 'id_prestador', $data, array('prompt'=>'Seleccione',
                                                                                    'class'=>'input-medium')
                                                );
                ?>
                <?php echo $form->error($model,'id_prestador'); ?>
                </div>
                <div id="pass_error"></div>
                <div id="check-pass" class="input-append">
                    <?php echo $form->passwordField($modelDatos, 'password'); ?>
                    <?php $this->widget('bootstrap.widgets.TbButton', array(
                        'label'=>'Verificar',
                        'type'=>'primary',
                        'htmlOptions'=>array(
                            'id'=>'btn-pass',
                            'onclick'=>'verificarPass()',
                        ),
                    )); ?>
                </div>
            </div>

            <br>

            <div id="tipo_prestamo" class="row-fluid" align="center">
                <legend class="span12 mtrs" style=" font-size: 17px;"><b>Tipo de Prestamo</b></legend>
                <div class="span5">
                    <?php echo CHtml::label('Sala',CHtml::activeId($model, 'id_tipoprestamo')); ?>
                    <?php echo CHtml::radioButton('tprestamo', true, array('value'=>1, 'uncheckvalue'=>null)); ?>
                </div>
                <div class="span5"> 
                    <?php echo CHtml::label('Circulante',CHtml::activeId($model, 'id_tipoprestamo')); ?>
                    <?php echo CHtml::radioButton('tprestamo', '', array('value'=>2, 'uncheckvalue'=>null)); ?>
                </div>
            </div>

            <br>

            <div id="fecha_prestamo" class="row-fluid" align="center">
                <legend class="span12 mtrs" style=" font-size: 17px;"><b>Fechas del Prestamo</b></legend>
                    <div id="fecha_prestamo" class="span5">
                        <?php echo $form->textFieldRow($model,'fecha_prestamo', array('readonly'=>true, 'value'=>date("d-m-Y"),)); ?>
                    </div>
                    <div id="fecha_entrega" class="span6">
                        <?php echo $form->labelEx($model, 'fecha_entrega'); ?>
                        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
                                            array(
                                                'model' => $model,
                                                'attribute' => 'fecha_entrega',
                                                'value' => $model->fecha_entrega,
                                                'language' => 'es',
                                                'htmlOptions' => array('readonly' => "readonly", 'class' => 'input-large', 'id'=>'fentrega'),
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
                                                                        'minDate'=> 0,
                                                                    ),
                                                                ));
                        ?>
                        <?php echo $form->error($model, 'fecha_entrega'); ?>
                    </div>
            </div>

            <br><br>

            <div id="seccion-guardar" align="center">
                <?php $this->widget('bootstrap.widgets.TbButton',
                                    array(
                                        'buttonType' => 'submit',
                                        'type' => 'success',
                                        'icon'=>'icon-ok',
                                        'label' => 'Guardar Prestamo',
                                        'htmlOptions' => array(
                                                            'id' => 'btn-guardar',
                                                        ),
                                    )
                            );
                ?>

                <?php $this->widget('bootstrap.widgets.TbButton',
                                    array(
                                        'type' => 'danger',
                                        'icon'=>'icon-remove',
                                        'label' => 'Cancelar',
                                        'url' => 'index.php?r=site/index',
                                        'htmlOptions' => array(
                                                            'id' => 'btn-cancelar',
                                                        ),
                                    )
                            );
                ?>
            </div>
        </div><!--fin datos prestamo-->
    </div><!--Fin materiales-container-->
</div><!--Fin formulario-->

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
        $("#tabla-mat3").hide();

        $("#ejemplar1").hide();
        $("#ejemplar2").hide();
        $("#ejemplar3").hide();

        $("#contenedor-prestamo").hide();
        $("#prestamo_data").hide(); */

        $("#check-pass").hide();
        $("#btn-modal").hide();

        $("#'.CHtml::activeId($model,'cedula').'").focus();

        var cantidadM = $("#'.CHtml::activeId($model, 'cant_material').'");
        var prestador = $("#'.CHtml::activeId($model,'id_prestador').'");

        $("#ejemplar_1").empty();
        $("#ejemplar_1").append(\'<option value="">...Seleccione...</option>\');
        $("#ejemplar_2").empty();
        $("#ejemplar_2").append(\'<option value="">...Seleccione...</option>\');
        $("#ejemplar_3").empty();
        $("#ejemplar_3").append(\'<option value="">...Seleccione...</option>\');

        cantidadM.change(function(){
            
            var cantidad = $("#'.CHtml::activeId($model, 'cant_material').'").val();
            //alert(cantidad);

            if (cantidad == 1) {
                
                $("#contenedor-prestamo").show(0500);

                $("#materiales").show(0500);
                $("#material_1").show(0500);            
                $("#material_2").hide(0500);
                $("#material_3").hide(0500);

                $("#mat2").val("");
                $("#ejemplar_2").html("");
                $("#ejemplar2").hide(0500);
                $("#tabla-mat2").html("");


                $("#mat3").val("");
                $("#ejemplar_3").html("");
                $("#ejemplar3").hide(0500);
                $("#tabla-mat3").html("");

                $("#prestamo_data").show(0500);

            }else{
                if (cantidad == 2) {

                    $("#contenedor-prestamo").show(0500);

                    $("#materiales").show(0500);
                    $("#material_1").show(0500);            
                    $("#material_2").show(0500);
                    $("#material_3").hide(0500);

                    $("#tabla-mat3").html("");

                    $("#mat3").val("");
                    $("#ejemplar_3").html("");
                    $("#ejemplar3").hide(0500);

                    $("#prestamo_data").show(0500);

                }else{
                    if (cantidad == 3) {

                        $("#contenedor-prestamo").show(0500);

                        $("#materiales").show(0500);
                        $("#material_1").show(0500);            
                        $("#material_2").show(0500);
                        $("#material_3").show(0500);

                        $("#prestamo_data").show(0500);

                    }else{
                        if (cantidad == "") {

                            limpiaryesconder();
                        }
                    }
                }
            }
        });

        prestador.change(function(){

            if ($(this).val() == 0 || $(this).val() == "") {
                
                alert("Seleccione un prestador");
                $("#check-pass").hide(0500);
                $("#pass_error").html("");
                $("#'.CHtml::activeId($modelDatos, 'password').'").val("");

            }else{

                //$("#btn-modal").click();
                $("#check-pass").show(0500);
                $("#pass_error").html("");
                $("#'.CHtml::activeId($modelDatos, 'password').'").val("").focus();

            }
        });
    });


    function datosSolicitante(){

        var cedula = $("#'.CHtml::activeId($model,'cedula').'").val();
        var select = $("#'.CHtml::activeId($model, 'cant_material').'");
        
        if (cedula !== "") {
            
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
                                            limpiar();

                                        }
                                    }

                            });
                    
            }else{

                $("#msg_error").html("");
            }
        
        }else{

            limpiarFormulario();
            $("#mensajesSistem").html("<span class=\"help-inline error\">Introduzca una cédula para proseguir!</span>");
        }
    }

    function verificarPass(){

        var id_prestador = $("#'.CHtml::activeId($model,'id_prestador').'").val();
        var pass = $("#'.CHtml::activeId($modelDatos,'password').'").val();

        switch (pass=="") {
            case true:
                alert("Introduzca la contraseña del usuario prestador!");
                break;

            case false:
                
                $.ajax({
                        url:"'.CController::createUrl('VerificarPass').'",
                        cache: false,
                        type: "POST",
                        dataType: "json",
                        data: ({prestador:id_prestador, pass:pass}),
                        beforeSend: function(xkr){
                                        $("#pass_error").html("");                                         
                                    },

                        success: function(data){
                                        
                                    if(data.error==0) {                                            

                                        $("#pass_error").html("<span class=\"help-inline success\">"+data.msg+"</span>");
                                        $("#check-pass").hide(0500);

                                                         
                                    }else{
                                        $("#pass_error").html("<span class=\"help-inline error\">"+data.msg+"</span>");
                                        $("#check-pass").hide(0500);
                                        $("#'.CHtml::activeId($model,'id_prestador').' option:eq(0)").prop("selected", true);
                                        $("#'.CHtml::activeId($modelDatos, 'password').'").val("");
                                    }
                                }

                });

                break;
        }
    }

    function buscarMaterial(num){                             
            
        var material = $("#mat"+num).val();
        var cotas = $("#materiales input:text").filter(":visible");


        cotas.each(function(){
                
            $(this).change(function(){
                alert($(this).val());
                var cantidad = cotas.length;

                switch (cantidad) {
                    case "2":
                        
                        var campo_cota_1 = $("#mat1");
                        var campo_cota_2 = $("#mat2");
                        
                        $("div#err_cotas").html("");

                        var campos = new Array(campo_cota_1, campo_cota_2);

                        campos.each(function(){

                            campos.change(function(){
                            
                                var cota_1 = $("#mat1").val();
                                var cota_2 = $("#mat2").val();

                                if (cota_1 == cota_2) {
                                    
                                    $(this).css("border-color", "#b94a48");
                                    $(this).val("");
                                    $("div#err_cotas").html("No puede escoger el mismo material 2 veces");
                                }
                            });
                        });
                        
                        break;
                    
                    default:
                        
                        break;
                }
            });
        });

        return false;

        if (material && material!=="") {
                
            $.ajax({
                    url:"'.CController::createUrl('DatosMaterial').'",
                    cache: false,
                    type: "POST",
                    dataType: "json",
                    data: ({material:material}),
                    beforeSend: function(xkr){
                                    $("#mensajesSistema"+num).html("");
                                    $(".materialData"+num).html("");
                                    $("#ejemplar_"+num).html("");
                                    $("#ejemplar_"+num).append(\'<option value="">...Seleccione...</option>\');

                                },

                    success: function(data){
                                        
                                if(data.error==0) {                                            

                                    $("#tabla-mat"+num).html(data.tabla);
                                    $("#tabla-mat"+num).show(0500);

                                    if (data.ejemplares !== "") {
                                            
                                        $("#ejemplar_"+num).append(data.ejemplares);
                                        $("#ejemplar"+num).show(0500);
                                        $("#mensajesSistema"+num).html("");
                                        
                                    }else{

                                        $("#ejemplar_"+num).html("");
                                        $("#ejemplar"+num).hide(0500);
                                        $("#mensajesSistema"+num).html(data.msg_error);
                                    }
                                                         
                                }else{
                                    $("#mensajesSistema"+num).html(data.msg_error);
                                    $("#tabla-mat"+num).hide(0500);
                                    $("#ejemplar_"+num).html("");
                                    $("#ejemplar"+num).hide(0500);
                                }
                            }
            });
        
        }else{
                
            $("#ejemplar_"+num).html("");
            $("#ejemplar"+num).hide(0500);
            $("#tabla-mat"+num).hide(0500);
            $("#mensajesSistema"+num).html("<span class=\"help-inline error\">Introduzca una cota para buscar el material</span>");
        
        }
    }

    function limpiaryesconder(){
        
        $("#mat1").val("");//cota
        $("#ejemplar_1").html("");//desplegable ejemplar
        $("#ejemplar1").hide(0500);//desplegable ejemplar
        $("#tabla-mat1").html("");//tabla de datos mat1

        $("#mat2").val("");//cota
        $("#ejemplar_2").html("");//desplegable ejemplar
        $("#ejemplar2").hide(0500);//desplegable ejemplar
        $("#tabla-mat2").html("");//tabla de datos mat1

        $("#mat3").val("");//cota
        $("#ejemplar_3").html("");//desplegable ejemplar
        $("#ejemplar3").hide(0500);//desplegable ejemplar
        $("#tabla-mat3").html("");//tabla de datos mat1

        $("#materiales").hide(0500);
        $("#material_1").hide(0500);
        $("#material_2").hide(0500);
        $("#material_3").hide(0500);

        $("#prestamo_data").hide(0500);

        $("#'.CHtml::activeId($model,'id_prestador').' option:eq(0)").prop("selected", true);//desplegable de prestador
        $("#'.CHtml::activeId($modelDatos, 'password').'").val("");//campo de password en prestador
        $("#fentrega").val("");//campo fecha de entrega
    }

    function limpiarFormulario(){

        $("#nombres_apellidos").html("");
        $("#telefono").html("");
        $("#correo").html("");
        $("#interno").html("");
        $("#semestre").html("");
        $("#fecha_registro").html("");
        $("#estado").html("");

        $(".datosPersonales").html("");
        $("#mensajesSistem").html("");

        $("#cant_materiales").hide(0500);
        $("#contenedor-prestamo").hide(0500);

        limpiaryesconder();

        $("#'.CHtml::activeId($model, 'cant_material').' option:eq(0)").prop("selected", true);
    }

    function limpiar(){

        $("#nombres_apellidos").html("");
        $("#telefono").html("");
        $("#correo").html("");
        $("#interno").html("");
        $("#semestre").html("");
        $("#fecha_registro").html("");
        $("#estado").html("");

        $("#cant_materiales").hide(0500);
        $("#contenedor-prestamo").hide(0500);

        limpiaryesconder();

        $("#'.CHtml::activeId($model, 'cant_material').' option:eq(0)").prop("selected", true);
    }

',CClientScript::POS_HEAD); ?>