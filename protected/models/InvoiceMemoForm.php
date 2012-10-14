<?php

/**
 * This is the form model class for table "customer_invoice".
 *
 * The followings are the available columns in table 'customer_invoice':
 */
class InvoiceMemoForm extends CFormModel
{
   public $id;
   public $patient_id;
   public $name;
   public $age;
   public $sex;
   public $mobile;
   public $refby;
   public $original_refby;
   //not required for form fields
   public $netpay;
   public $subtotal;
   public $less_discount;
   public $recieved;
   public $due;
   public $create_date;
   public $update_date;
   //end not required
   
   public $tests;
   public $testsIds;
   public $refby_name;
   public $original_refby_name;

   /**
    * @return string the associated database table name
    */
   public function tableName()
   {
      return 'customer_invoice';
   }

   /**
    * @return array validation rules for model attributes.
    */
   public function rules()
   {
      // NOTE: you should only define rules for those attributes that
      // will receive user inputs.
      return array(
         array('name, age, sex', 'required'),
         array('age, refby, original_refby', 'numerical', 'integerOnly'=>true),
         array('subtotal, less_discount, netpay, recieved, due', 'numerical'),
         array('patient_id, name', 'length', 'max'=>255),
         array('sex', 'length', 'max'=>6),
         array('mobile', 'length', 'max'=>128),
         array('create_date, update_date', 'safe'),
         // The following rule is used by search().
         // Please remove those attributes that should not be searched.
         array('id, patient_id, name, age, sex, mobile, refby, original_refby, subtotal, less_discount, netpay, recieved, due, create_date, update_date', 'safe', 'on'=>'search'),
      );
   }

   /**
    * @return array customized attribute labels (name=>label)
    */
   public function attributeLabels()
   {
      return array(
         'id'                  => 'ID',
         'patient_id'          => 'Patient ID',
         'name'                => 'Patient Name',
         'age'                 => 'Age',
         'sex'                 => 'Sex',
         'mobile'              => 'Mob',
         'refby'               => 'Ref. by',
         'original_refby'      => 'Original Ref. by',
         'subtotal'            => 'Subtotal',
         'less_discount'       => 'Less Discount',
         'netpay'              => 'Netpay',
         'recieved'            => 'Recieved',
         'due'                 => 'Due',
         'create_date'         => 'Create Date',
         'update_date'         => 'Update Date',
         'tests'               => 'Test/Investigation Name',
         'testsIds'            => 'Test Id',
         'refby_name'          => 'Ref. by',
         'original_refby_name' => 'Original Ref. by'
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
      $criteria->compare('patient_id',$this->patient_id,true);
      $criteria->compare('name',$this->name,true);
      $criteria->compare('age',$this->age);
      $criteria->compare('sex',$this->sex,true);
      $criteria->compare('mobile',$this->mobile,true);
      $criteria->compare('refby',$this->refby);
      $criteria->compare('original_refby',$this->original_refby);
      $criteria->compare('subtotal',$this->subtotal);
      $criteria->compare('less_discount',$this->less_discount);
      $criteria->compare('netpay',$this->netpay);
      $criteria->compare('recieved',$this->recieved);
      $criteria->compare('due',$this->due);
      $criteria->compare('create_date',$this->create_date,true);
      $criteria->compare('update_date',$this->update_date,true);

      return new CActiveDataProvider($this, array(
         'criteria'=>$criteria,
      ));
   }
}