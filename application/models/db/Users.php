<?php
// Add the namespace here:
namespace application\models\db;
// Along with the correct "use"'s/
use \Yii;
use \CException;
use \application\components\ActiveRecord;
/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property integer $title
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property integer $ageGroup
 * @property string $username
 * @property string $password
 * @property integer $created
 * @property integer $active
 * @property integer $priv
 * @property integer $optIn
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
			array('firstname, lastname, ageGroup, username, password, created, priv', 'required'),
			array('title, ageGroup, created, priv', 'numerical', 'integerOnly'=>true),
			array('active, optIn', 'boolean'),
			array('firstname, middlename, lastname, username', 'length', 'max'=>36),
			array('password', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, firstname, middlename, lastname, ageGroup, username, password, created, active, priv, optIn', 'safe', 'on'=>'search'),
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
			'address' => array(self::HAS_ONE, '\\application\\models\\db\\CustomerAddress', 'customerId'),
			'contactDetails' => array(self::HAS_ONE, '\\application\\models\\db\\CustomerContactDetails', 'customerId'),
			'registrations' => array(self::HAS_MANY, '\\application\\models\\db\\Registration', 'customerId'),
			'ageGroup0' => array(self::BELONGS_TO, '\\application\\models\\db\\Option', 'ageGroup'),
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
			'created' => 'Created',
			'active' => 'Active',
			'priv' => 'Priv',
			'optIn' => 'Opt In',
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
		$criteria->compare('title',$this->title);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('middlename',$this->middlename,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('ageGroup',$this->ageGroup);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('active',$this->active);
		$criteria->compare('priv',$this->priv);
		$criteria->compare('optIn',$this->optIn);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function __set($property, $value)
    {
        // If an override method exists for a certain property, call it to alter the value before passing it to the
        // model to be saved to the database.
        $method = 'set' . ucwords($property);
        if(method_exists($this, $method)) {
            $value = $this->{$method}($value);
        }
        // Carry on setting it to the model as normal.
        parent::__set($property, $value);
    }
	
	public function password($password)
    {
        return \CPasswordHelper::verifyPassword($password, $this->password);
    }
    
	public function setpassword($password)
    {
        return \CPasswordHelper::hashPassword($password);
    }
}
