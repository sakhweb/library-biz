<?php
/* @var $this BookController */
/* @var $model Book */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'authorArr'); ?>
            <?php echo $form->dropDownList($model, 'authorArr', CHtml::listData(Author::model()->findAll(), 'id', 'name'), array('multiple' => 'multiple', 'size' => '12', 'style'=>'width:393px' )) ?>
		<?php echo $form->error($model,'authorArr'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'readers_id'); ?>
            <?php echo $form->dropDownList($model, 'readers_id', CHtml::listData(Readers::model()->findAll(), 'id','name'), array('empty'=>'(no reader)')) ?>
            <?php echo $form->error($model,'readers_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->