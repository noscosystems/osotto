<?php
// Add the namespace here:
namespace application\models\db;
// Along with the correct "use"'s/
use \Yii;
use \CException;
use \application\components\ActiveRecord;
use \application\models\db\Product;
use \application\models\db\Users;
/**
 * This is the model class for table "registration".
 *
 * The followings are the available columns in table 'registration':
 * @property integer $id
 * @property integer $customerId
 * @property integer $productId
 * @property string $serial_number
 * @property string $MAC
 * @property string $date_purchased
 * @property string $purchased_from
 *
 * The followings are the available model relations:
 * @property User $customer
 * @property Product $product
 */
class Registration extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customerId, productId, serial_number', 'required'),
			array('customerId, productId', 'numerical', 'integerOnly'=>true),
			array('serial_number', 'length', 'max'=>50),
			array('MAC', 'length', 'max'=>12),
			array('purchased_from', 'length', 'max'=>45),
			array('date_purchased', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, customerId, productId, serial_number, MAC, date_purchased, purchased_from', 'safe', 'on'=>'search'),
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
			'customer' => array(self::BELONGS_TO, 'User', 'customerId'),
			'product' => array(self::BELONGS_TO, 'Product', 'productId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'customerId' => 'Customer',
			'productId' => 'Product',
			'serial_number' => 'Serial Number',
			'MAC' => 'Mac',
			'date_purchased' => 'Date Purchased',
			'purchased_from' => 'Purchased From',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('customerId',$this->customerId);
		$criteria->compare('productId',$this->productId);
		$criteria->compare('serial_number',$this->serial_number,true);
		$criteria->compare('MAC',$this->MAC,true);
		$criteria->compare('date_purchased',$this->date_purchased,true);
		$criteria->compare('purchased_from',$this->purchased_from,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Registration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
