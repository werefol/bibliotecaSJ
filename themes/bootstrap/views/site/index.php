<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<script src="<?php echo Yii::app()->request->baseUrl."/js/boton.js"; ?>" type="text/javascript"></script>

<h1><i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Sistema de gestión bibliotecaria "Sara Jiménez".</p>

<?php $this->widget('bootstrap.widgets.TbCarousel', array(
    'items'=>array(
        array(
        	'image'=> 'images/biblioteca-sara-jimenez2.jpg',
        	'label'=>'Reinauguran Biblioteca "Sara Jimenez"',
        	'caption'=>'Reinauguración de la biblioteca "Sara Jimenez" como parte de la Ciudad de las Artes de Sebucan.',
            'htmlOptions'=>array('width'=>'500px'),
            ),

        array(
            'image'=> 'images/biblioteca-sara-jimenez1.jpg',
            'label'=>'Nueva infraestructura de la biblioteca', 
            'caption'=>'Al pasar a ser parte del proyecto Ciudad de las Artes, la biblioteca toma una nueva apariencia.'),

        array(
            'image'=> 'images/biblioteca-sara-jimenez3.jpg',
            'label'=>'Reinauguran Biblioteca "Sara Jimenez"', 
            'caption'=>'Reinauguración de la biblioteca "Sara jimenez" como parte de la Ciudad de las Artes de Sebucan.'),
    ),

    'htmlOptions' => array('width'=>'500px')
)); ?>

<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>