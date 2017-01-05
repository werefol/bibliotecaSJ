<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<script src="<?php echo Yii::app()->request->baseUrl."/js/boton.js"; ?>" type="text/javascript"></script>

<br><br>
<h1><i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Sistema de gestión bibliotecaria "Sara Jiménez".</p>

<?php
    
    $images = array('image1'=>'images/biblioteca-sara-jimenez2.jpg',
                    'image2'=>'images/biblioteca-sara-jimenez2.jpg',
                    'image3'=>'images/biblioteca-sara-jimenez2.jpg'
                    );
    $items = [];

    foreach ($images as $key => $value) {
        
        $items[]= [
            'imagen'=>$value;
            'itemOptions'=>array('width'=>'1200px', 'height'=>'800px');
        ];
    }
?>
<?php $this->widget('bootstrap.widgets.TbCarousel', array(
    'items'=>$items,
)); ?>

<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
