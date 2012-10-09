<?php

/**
 * This is the model class for table "test".
 *
 * The followings are the available columns in table 'test':
 * @property integer $id
 * @property string $test_name
 * @property double $category_id
 * @property integer $refvalue
 * @property double $test_amount
 * @property string $test_room
 */
class Test extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Test the static model class
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
		return 'test';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_name, category_id, refvalue, test_amount, test_room', 'required'),
			array('refvalue', 'numerical', 'integerOnly'=>true),
			array('category_id, test_amount', 'numerical'),
			array('test_name', 'length', 'max'=>255),
			array('test_room', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, test_name, category_id, refvalue, test_amount, test_room', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'test_name' => 'Test Name',
			'category_id' => 'Category',
			'refvalue' => 'Refvalue',
			'test_amount' => 'Test Amount',
			'test_room' => 'Test Room',
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
		$criteria->compare('test_name',$this->test_name,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('refvalue',$this->refvalue);
		$criteria->compare('test_amount',$this->test_amount);
		$criteria->compare('test_room',$this->test_room,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}