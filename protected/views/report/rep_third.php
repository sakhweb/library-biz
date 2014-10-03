<?php
/* @var $this ReportController */

$this->breadcrumbs=array(
	'Report',
);

$this->menu = array(
    array('label'=>'Report First', 'url'=>array('index')),
    array('label'=>'Report Second', 'url'=>array('rep_second')),
    array('label'=>'Report Third', 'url'=>array('rep_third')),
);
?>
<h3>Вывод пяти случайных книг</h3>

<div class="report">
    <div class="report-tr">
        <span><b>Book</b></span>
        <span><b>Reader</b></span>
        <span><b>Author</b></span>
    </div>
    <?foreach ($model as $key => $book){ ?>
        <div class="report-tr">
            <span><?=$book->name?></span>
            <span><?=!empty($book->readers_id) ? $book->readers->name : '***'?></span>
            <span><?=implode(", ",CHtml::ListData($book->Authors, 'id','name'))?></span>
        </div>
    <?}?>
</div>

