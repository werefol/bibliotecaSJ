<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.min.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/forms_reg.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body style="background-color: #153f35; color: #fff;">

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
							array('label'=>'Registro'),
							array('label'=>'Registrar Usuario', 'url'=>array('/Operaciones/datos/create', 'reg'=>1)),
							array('label'=>'Registrar Solicitante', 'url'=>array('/Operaciones/datos/create', 'reg'=>2)),
							'---',
							array('label'=>'Consulta'),
							array('label'=>'Consultar Usuario', 'url'=>array('/Operaciones/usuarios/admin')),
							array('label'=>'Consultar Solicitante', 'url'=>array('/Operaciones/solicitantes/admin')),
					),
				),

				array('label'=>'Prestamos',
					'items'=>array(
							array('label'=>'Realizar Préstamo', 'url'=>array('/site/page', 'view'=>'about')),
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
<div class="foot-container">
	<div id="footer" class="span12">
		<div class="foot-content">
			Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
			All Rights Reserved.<br/>
			<?php echo Yii::powered(); ?>
		</div>
	</div><!-- footer -->
</div>


</div><!-- page -->

</body>
</html>
