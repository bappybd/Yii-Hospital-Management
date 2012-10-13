<?php

/**
 * This is the model class for table "original_ref_by".
 *
 * The followings are the available columns in table 'original_ref_by':
 * @property integer $id
 * @property string $name
 * @property string $deg
 * @property string $hospital_name
 * @property string $mob
 * @property string $email
 * @property string $pic
 */
class OriginalRefBy extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OriginalRefBy the static model class
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
		return 'original_ref_by';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, deg, hospital_name, mob, email, pic', 'required'),
			array('name, deg, hospital_name, pic', 'length', 'max'=>255),
			array('mob, email', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, deg, hospital_name, mob, email, pic', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'deg' => 'Deg',
			'hospital_name' => 'Hospital Name',
			'mob' => 'Mob',
			'email' => 'Email',
			'pic' => 'Pic',
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
		$criteria->compare('deg',$this->deg,true);
		$criteria->compare('hospital_name',$this->hospital_name,true);
		$criteria->compare('mob',$this->mob,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pic',$this->pic,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}