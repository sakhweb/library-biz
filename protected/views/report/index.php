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
<h3>Вывод списка книг, находящихся на руках у читателей, и имеющих не менее трех со-авторов.</h3>

<div class="report">
    <div class="report-tr">
        <span>Book</span>
        <span>Is occupied</span>
        <span>Number of authors</span>
    </div>
    <? foreach ($model as $key => $book){ ?>
    <div class="report-tr">
        <span><?php echo $book->name ?></span>
        <span>Yes</span>
        <span><?php echo $book->ACount ?></span>
    </div>
    <?}?>
</div>


