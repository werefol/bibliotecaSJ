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

        <div id="cant_materiales" class="row" align="center">
            <?php echo CHtml::label('Cantidad de materiales para el prestamo(max 3).', CHtml::activeId($materiales, 'cantidad')); ?>
            <?php echo $form->dropDownList($materiales, 'cantidad', array('1'=>'1',
                                                                            '2'=>'2',
                                                                            '3'=>'3'),
                                                                array('prompt'=>'Seleccione',
                                                                        'class'=>'input-medium')
                                            );
            ?>
        </div>
        <br><br>
    <div id="materiales" class="container-fluid"><br>

        <div id="material_1" class="row" align="center">
            <fieldset><!--Datos del Material1-->
                <legend class="span11" style=" font-size: 17px;"><b>Datos del Material</b></legend>
                <div class="span11">
                    <div><b><?php echo CHtml::label('Cota','mat1'); ?></b></div>
                    <div>
                        <?php echo CHtml::textField('mat1','',array('maxlength'=>'10', 'onchange'=>'buscarMaterial()')); ?>
                    </div>
                <div id="mensajesSistema"  class="materialData"></div>
                <br>                    
                <div id="tabla-mat1"></div>
                </div>
            </fieldset><!--fin datos del material1-->
        </div>

        <div id="material_2" class="row" align="center">
            <fieldset><!--Datos del Material2-->
                <legend class="span11" style=" font-size: 17px;"><b>Datos del Material</b></legend>
                <div class="span11">
                    <div><b><?php echo CHtml::label('Cota','mat2'); ?></b></div>
                    <div>
                        <?php echo CHtml::textField('mat2','',array('maxlength'=>'10', 'onchange'=>'buscarMaterial()')); ?>
                    </div>
                <div id="mensajesSistema2"  class="materialData2"></div>
                <br>                    
                <div id="tabla-mat2"></div>
                </div>
            </fieldset><!--fin datos del material2-->
        </div>

        <div id="material_3" class="row" align="center">
            <fieldset><!--Datos del Material3-->
                <legend class="span11" style=" font-size: 17px;"><b>Datos del Material</b></legend>
                <div class="span11">
                    <div><b><?php echo CHtml::label('Cota','mat3'); ?></b></div>
                    <div>
                        <?php echo CHtml::textField('mat3','',array('maxlength'=>'10', 'onchange'=>'buscarMaterial()')); ?>
                    </div>
                <div id="mensajesSistema3"  class="materialData3"></div>
                <br>                    
                <div id="tabla-mat3"></div>
                </div>
            </fieldset><!--fin datos del material3-->
        </div>
        <br>

        <div id="cant_materiales" class="row" align="center">
            <legend class="span11" style=" font-size: 17px;"><b>Prestador</b></legend>
            <div class="span11">
            <?php 
                $datos = Datos::model()->findAll('id_tipo=1 and borrado=FALSE');
                $data = array();

                foreach ($datos as $dato)
                    $data[$dato->id] = $dato->nombres . ' '. $dato->apellidos;
            ?>
            <?php echo $form->dropDownList($model, 'id_prestador', $data, array('prompt'=>'Seleccione',
                                                                                'class'=>'input-medium')
                                            );
            ?>
            </div>
            <div id="pass_error" class="span11"></div>
            <div id="check-pass" class="span11 input-append">
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

        <div id="tipo_prestamo" class="row" align="center">
            <legend class="span11" style=" font-size: 17px;"><b>Tipo de Prestamo</b></legend>
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

        <div id="fecha_prestamo" class="row" align="center">
            <legend class="span11" style=" font-size: 17px;"><b>Fechas del Prestamo</b></legend>
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
                </div>
        </div>
        <br><br>
        <div id="seccion-guardar" align="center">
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
                        );
            ?>
        </div>
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
        $("#tabla-mat3").hide();*/
        $("#check-pass").hide();
        $("#btn-modal").hide();
        var select = $("#'.CHtml::activeId($materiales,'cantidad').'");
        var prestador = $("#'.CHtml::activeId($model,'id_prestador').'");

        select.change(function(){
            
            var cantidad = $("#'.CHtml::activeId($materiales, 'cantidad').'").val();
            alert(cantidad);

            if (cantidad == 1) {

                $("#materiales").show(0500);
                $("#material_1").show(0500);            
                $("#material_2").hide(0500);
                $("#material_3").hide(0500);

                $("#tabla-mat2").html("");
                $("#tabla-mat3").html("");

                $("#mat2").val("");
                $("#mat3").val("");

            }else{
                if (cantidad == 2) {

                    $("#materiales").show(0500);
                    $("#material_1").show(0500);            
                    $("#material_2").show(0500);
                    $("#material_3").hide(0500);

                    $("#tabla-mat3").html("");

                    $("#mat3").val("");                
                }else{
                    if (cantidad == 3) {

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

            if ($(this).val() == 0 || $(this).val() == "") {
                
                alert("Seleccione un prestador");
                $("#check-pass").hide(0500);
                $("#pass_error").html("");

            }else{

                //$("#btn-modal").click();
                $("#check-pass").show(0500);
                $("#pass_error").html("");

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

    function buscarMaterial(){

        var mate1 = $("#mat1");
        var mate2 = $("#mat2");
        var mate3 = $("#mat3");

        if (mate1.change) {
                             
            var material = mate1.val();
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
        }

        if (mate2.change) {
                             
            var material = mate2.val();
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
        }

        if (mate3.change) {
                             
            var material = mate3.val();
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
        }
    }

    function limpiarCota(){
        
        $("#mat1").val("");
        $("#mat2").val("");
        $("#mat3").val("");
    }

',CClientScript::POS_HEAD); ?>