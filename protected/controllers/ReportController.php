<?php

class ReportController extends Controller
{
    public $layout='//layouts/column2';
    
	public function actionIndex()
	{
            $model=Book::model()->with('Authors')->findAll(array(
                    'condition' => 'readers_id is not null',
                    'group'=> 't.id',
                    'having'=>'COUNT(*)>=3'
                ));
            
		$this->render('index', array(
                    'model' => $model
                ));
	}
        
    public function actionRep_second()
	{
		$model = Author::model()->with('readers')->findAll(
                            array(
                            'condition'=>'Books.readers_id is not null',
                            'group'=> 't.id',
                            'having'=>'COUNT(*)>3'
                        )
                );
    
		$this->render('rep_second', array(
                    'model' => $model,
                ));
	}
        
    public function actionRep_third()
	{
            $model = Book::model()->with('readers')->findAll(
                            array(
                            'order'=>'RAND()',
                            'limit'=> '5'
                        )
                );
                
		$this->render('rep_third', array(
                    'model' => $model,
                ));
	}
}