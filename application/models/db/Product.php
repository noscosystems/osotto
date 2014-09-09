<?php
// Add the namespace here:
namespace application\models\db;
// Along with the correct "use"'s/
use \Yii;
use \CException;
use \application\components\ActiveRecord;
/**
 * This is the model class for table "Product".
 *
 * The followings are the available columns in table 'Product':
 * @property integer $id
 * @property string $model_number
 * @property string $short_desc
 * @property string $long_desc
 * @property string $spec_brief
 * @property string $spec_full
 * @property string $name
 * @property integer $catId
 * @property integer $active
 * @property integer $featured
 *
 * The followings are the available model relations:
 * @property Pdf[] $pdfs
 * @property ProductImages[] $productImages
 * @property Registration[] $registrations
 */
class Product extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('model_number, name, catId, featured', 'required'),
			array('catId, active, featured', 'numerical', 'integerOnly'=>true),
			array('model_number', 'length', 'max'=>255),
			array('short_desc, spec_brief', 'length', 'max'=>128),
			array('name', 'length', 'max'=>64),
			array('long_desc, spec_full', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, model_number, short_desc, long_desc, spec_brief, spec_full, name, catId, active, featured', 'safe', 'on'=>'search'),
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
			'categorie' => 	   array(self::BELONGS_TO, '\\application\\models\\db\\ProductCategories', 'id'),
			'pdf' => 		   array(self::HAS_ONE, '\\application\\models\\db\\Pdf', 'productId'),
			'productImages' => array(self::HAS_MANY, '\\application\\models\\db\\ProductImages', 'productId'),
			'registrations' => array(self::HAS_MANY, '\\application\\models\\db\\Registration', 'productId')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'model_number' => 'Model Number',
			'short_desc' => 'Short Desc',
			'long_desc' => 'Long Desc',
			'spec_brief' => 'Spec Brief',
			'spec_full' => 'Spec Full',
			'name' => 'Name',
			'catId' => 'Cat',
			'active' => 'Active',
			'featured' => 'Featured',
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
		$criteria->compare('model_number',$this->model_number,true);
		$criteria->compare('short_desc',$this->short_desc,true);
		$criteria->compare('long_desc',$this->long_desc,true);
		$criteria->compare('spec_brief',$this->spec_brief,true);
		$criteria->compare('spec_full',$this->spec_full,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('catId',$this->catId);
		$criteria->compare('active',$this->active);
		$criteria->compare('featured',$this->featured);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
