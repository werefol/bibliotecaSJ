<h1>Prestamos</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'prestamo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		array(
            'name'=>'id_solicitante',
            //'value'=>"\$data->id_asociado";
            'value'=>'$data->idSolicitante->nombres',
        ),

        array(
            'name'=>'id_prestador',
            //'value'=>"\$data->id_asociado";
            'value'=>'$data->idPrestador->nombres',
        ),

        array(
            'name'=>'id_receptor',
            //'value'=>"\$data->id_asociado";
            'value'=>"(\$data->idReceptor == \"\")?'Prestamo Vigente':\$data->idSolicitante->nombres",
        ),

        array(
            'name'=>'cant_material',
            'value'=>'$data->cant_material',
            'filter'=>array('1'=>1,'2'=>2, '3'=>3),
        ),

        array(
            'name'=>'fecha_prestamo',
            //'value'=>"\$data->id_asociado";
            'value'=>'date("d-m-Y", strtotime($data->fecha_prestamo))',
        ),

        array(
            'name'=>'fecha_entrega',
            //'value'=>"\$data->id_asociado";
            'value'=>'date("d-m-Y", strtotime($data->fecha_entrega))',
        ),

        array(
            'name'=>'id_status',
            //'value'=>"\$data->id_asociado";
            'value'=>'$data->idStatus->status',
            'filter'=>CHtml::listData(StatusPrestamo::model()->findAll(), 'id','status'),
        ),
		/*
		'fecha_entrega',
		'renovacion',
		'borrado',
		*/
		array(
			'header'=>'Acciones',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('width'=>'80'),
			'template'=>'{view} {mail-alerta} {update} {delete}',
			'buttons' => array(

							'mail-alerta' => array(
						        'label'=>'Enviar correo de alerta',
						        'icon' => 'icon-envelope',
						        'visible'=>'($data->id_status == 3)?true:false',
						        'url'=>'CController::createUrl("CorreoAlerta")',
					        ),
						),
		),
	),
)); ?>
