<?php

/**
 * This is the model class for table "{{book}}".
 *
 * The followings are the available columns in table '{{book}}':
 * @property integer $id
 * @property string $name
 * @property string $date_insert
 * @property string $date_update
 * @property integer $readers_id
 *
 * The followings are the available model relations:
 * @property Readers $readers
 * @property Author[] $sssAuthors
 */
class Book extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Book the static model class
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
		return '{{book}}';
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
			array('readers_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>150),
			array('date_insert, date_update', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, date_insert, date_update, readers_id', 'safe', 'on'=>'search'),
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
            'ACount'=>array(self::STAT, 'Author', '{{book_auth_lib}}(author_id, book_id)'), // Stat query http://www.yiiframework.com/doc/guide/1.1/en/database.arr#statistical-query
			'readers' => array(self::BELONGS_TO, 'Readers', 'readers_id'),
			'Authors' => array(self::MANY_MANY, 'Author', '{{book_auth_lib}}(book_id, author_id)'),
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
			'date_update' => 'Date Update',
			'readers_id' => 'Readers',
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
		$criteria->compare('date_update',$this->date_update,true);
		$criteria->compare('readers_id',$this->readers_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    // Insert and change date
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            if($this->isNewRecord)
            {
                $this->date_insert = $this->date_update = date('Y-m-d H:i:s');
            }
            else{
                $this->date_update = date('Y-m-d H:i:s');
            }

            return true;
        }
        else
            return false;
    }

    // Insert and change date
    protected function afterSave() {
        parent::afterSave();

        if(!$this->isNewRecord){
            BookAuthLib::model()->deleteAll('book_id = :book_id', array('book_id'=> $this->id));
        }

        if(isset($_POST['Book']['authorArr'])){
            foreach ($_POST['Book']['authorArr'] as $key => $author_id) {
                $BookAuth = new BookAuthLib();
                $BookAuth->book_id = $this->id;
                $BookAuth->author_id = $author_id;
                $BookAuth->save();
            }
        }
    }

    public function getAuthorArr(){
        $author = array();
        if(!empty($this->Authors)){
            foreach ($this->Authors as $value) {
                $author[]=$value->id;
            }
        }
        return $author ;
    }

    public function setAuthorArr($value) {
        $this->authorArray = $value;
    }
}