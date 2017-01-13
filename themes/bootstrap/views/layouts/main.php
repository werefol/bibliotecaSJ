<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body style="background-color: #155; color: #fff;">

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
	'type'=>'inverse',
    'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
            	array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Operaciones',
					'items'=>array(
							array('label'=>'Personas', 'items'=>array(array('label'=>'Registro'),
																		array('label'=>'Registrar Usuario', 'url'=>array('/Operaciones/datos/create', 'reg'=>1)),
																		array('label'=>'Registrar Solicitante', 'url'=>array('/Operaciones/datos/create', 'reg'=>2)),
																		'---',
																		array('label'=>'Consulta'),
																		array('label'=>'Consultar Usuarios', 'url'=>array('/Operaciones/datos/admin', 'tipo'=>1)),
																		array('label'=>'Consultar Estudiantes', 'url'=>array('/Operaciones/datos/admin', 'tipo'=>2)),
																		array('label'=>'Consultar Profesores', 'url'=>array('/Operaciones/datos/admin', 'tipo'=>3)),
																		),),

							array('label'=>'Materiales', 'items'=>array(array('label'=>'Registro'),
																		array('label'=>'Registrar Material', 'url'=>array('/Operaciones/materiales/create')),
																		'---',
																		array('label'=>'Consulta'),
																		array('label'=>'Consultar Materiales', 'url'=>array('/Operaciones/materiales/admin')),
																		),),
					),
				),

				array('label'=>'Prestamos',
					'items'=>array(
							array('label'=>'Realizar Préstamo', 'url'=>array('/Prestamos/prestamo/create')),
							array('label'=>'Consultar Préstamo', 'url'=>'#'),
					),
				),

                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
	<br><br>
	<div id="foot-container" >
		<div id="footer" class="span12">
			<div class="foot-content">
			<hr class="soften">
				Desarrollado por <b><i>Franklin Guerra</i></b>.<br/>
				Copyright &copy; 2016 - Todos los derechos reservados.<br/>
				<?php echo Yii::powered(); ?>
			</div>
		</div><!-- footer -->
	</div>

</div><!-- page -->

</body>
</html>
