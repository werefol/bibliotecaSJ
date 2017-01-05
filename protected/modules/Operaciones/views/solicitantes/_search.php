<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id_sol',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ci_sol',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nombre_sol',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'apellido_sol',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'telefono_sol',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'correo_sol',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'semestre',array('class'=>'span5')); ?>

	<?php echo $form->checkBoxRow($model,'externo'); ?>

	<?php echo $form->checkBoxRow($model,'status_sol'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
