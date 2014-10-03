<?php

/**
 * This is the model class for table "{{author}}".
 *
 * The followings are the available columns in table '{{author}}':
 * @property integer $id
 * @property string $name
 * @property string $date_insert
 * @property string $date_upfate
 *
 * The followings are the available model relations:
 * @property Book[] $sssBooks
 */
class Author extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Author the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{author}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>150),
			array('date_insert, date_upfate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, date_insert, date_upfate', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Books' => array(self::MANY_MANY, 'Book', '{{book_auth_lib}}(author_id, book_id)'),
            'readers'=>array(self::HAS_MANY,'Readers',array('readers_id'=>'id'),'through'=>'Books'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'date_insert' => 'Date Insert',
			'date_upfate' => 'Date Upfate',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date_insert',$this->date_insert,true);
		$criteria->compare('date_upfate',$this->date_upfate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}