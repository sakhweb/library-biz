<?php
/* @var $this BookController */
/* @var $data Book */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_update')); ?>:</b>
	<?php echo CHtml::encode($data->date_update); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('readers_id')); ?>:</b>
	<?php echo CHtml::encode($data->readers->name); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b>
    <?php echo implode(", ",CHtml::ListData($data->Authors, 'id','name')); ?>
    <br />


</div>