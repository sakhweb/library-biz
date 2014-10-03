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
<h3>Вывод списка авторов, чьи книги в данный момент читает более трех читателей</h3>

<div class="report">
    <div class="report-tr">
        <span>Author</span>
    </div>
    <? foreach ($model as $key => $author){
        ?>
        <div class="report-tr">
            <span><? echo $author->name ?></span>
        </div>
    <?}?>
</div>

