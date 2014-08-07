<?php
// Add the namespace here:
namespace application\models\db;
// Along with the correct "use"'s/
use \Yii;
use \CException;
use \application\components\ActiveRecord;
use \application\models\db\CustomerAddress;
use \application\models\db\CustomerContactDetails;
use \application\models\db\Registration;
use \application\models\db\Option;

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $title
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property integer $ageGroup
 * @property string $username
 * @property string $password
 *
 * The followings are the available model relations:
 * @property CustomerAddress[] $customerAddresses
 * @property CustomerContactDetails[] $customerContactDetails
 * @property Registration[] $registrations
 * @property Option $ageGroup0
 */
class Users extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, firstname, lastname, ageGroup, username, password', 'required'),
			array('ageGroup', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('firstname, middlename, lastname, username', 'length', 'max'=>36),
			array('password', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, firstname, middlename, lastname, ageGroup, username, password', 'safe', 'on'=>'search'),
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
			'customerAddresses' => array(self::HAS_MANY, 'CustomerAddress', 'customerId'),
			'customerContactDetails' => array(self::HAS_MANY, 'CustomerContactDetails', 'customerId'),
			'registrations' => array(self::HAS_MANY, 'Registration', 'customerId'),
			'ageGroup0' => array(self::BELONGS_TO, 'Option', 'ageGroup'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'firstname' => 'Firstname',
			'middlename' => 'Middlename',
			'lastname' => 'Lastname',
			'ageGroup' => 'Age Group',
			'username' => 'Username',
			'password' => 'Password',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('middlename',$this->middlename,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('ageGroup',$this->ageGroup);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
