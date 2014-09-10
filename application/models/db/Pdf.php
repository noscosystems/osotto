<?php
// Add the namespace here:
namespace application\models\db;
// Along with the correct "use"'s/
use \Yii;
use \CException;
use \application\components\ActiveRecord;
/**
 * This is the model class for table "pdf".
 *
 * The followings are the available columns in table 'pdf':
 * @property integer $id
 * @property integer $productId
 * @property string $url
 *
 * The followings are the available model relations:
 * @property Product $product
 */
class Pdf extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pdf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('productId, url', 'required'),
			array('productId', 'numerical', 'integerOnly'=>true),
			array('url', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, productId, url', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, '\\aplication\\models\\db\\Product', 'productId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'productId' => 'Product',
			'url' => 'Url',
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
		$criteria->compare('productId',$this->productId);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pdf the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function pdfUpl($frm,$pdf)
	{	
		if (isset($_FILES['pdf'])){

            if ($_FILES['pdf']['size']>0 && $_FILES['pdf']['type'] == 'application/pdf'){

                $ext = strstr($_FILES['pdf']['name'], '.');
                $_FILES['pdf']['name'] = substr(md5(time()), 0, 7).$ext;
                $pdf->url = $dest = Yii::getPathOfAlias('application.views.Uploads.pdfs').'\\'.$_FILES['pdf']['name'];
                if (move_uploaded_file($_FILES['pdf']['tmp_name'], $dest))
                	return true;
            }
            else{
                $frm->addError('pdfErro','File uploader empty or file is not a pdf.');
                return false;
            }
        
        }
	}
}
