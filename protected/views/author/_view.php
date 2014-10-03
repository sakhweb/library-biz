<?php
/* @var $this AuthorController */
/* @var $data Author */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_insert')); ?>:</b>
	<?php echo CHtml::encode($data->date_insert); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_upfate')); ?>:</b>
	<?php echo CHtml::encode($data->date_upfate); ?>
	<br />


</div>