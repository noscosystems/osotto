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
 * This is the model class for table "product_categories".
 *
 * The followings are the available columns in table 'product_categories':
 * @property integer $id
 * @property string $name
 * @property string $catImg
 */
class ProductCategories extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, catImg', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('catImg', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, catImg', 'safe', 'on'=>'search'),
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
			'products' => array(self::HAS_MANY, 'Product', 'catId')
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
			'catImg' => 'Cat Img',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('catImg',$this->catImg,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductCategories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function image_upload($form){
        //2 097 152 = 2MegaBytes;
        $allowed_img_types = Array('image/jpeg','image/png');	//allowed image types, stored in an array
        //$mime_type = image_type_to_mime_type(exif_imagetype($_FILES['image1']['tmp_name']));
        $size = [];
		if ($_FILES['image1']['size']>0 && $_FILES['image1']['type']!='' && $_FILES['image1']['tmp_name']!=''){
			$size = getimagesize($_FILES['image1']['tmp_name']);
			// if (count($asset->Images)>0){
			// 		array_push($this->errors,'Maximum number of images reached for this asset.');
			// }
			if (!in_array($size['mime'],$allowed_img_types)){ // Checking wether the image is of the allowed image types
				array_push($this->errors, 'Image not of allowed type. Allowed image types are jpeg, bmp and png!');
			}
			else{
				$ext = strstr($_FILES['image1']['name'], '.');
				$_FILES['image1']['name'] = substr(md5(time()), 0, 7).$ext;	//sets a name based on crrent time
				//then md5's it :D and get's a part of the string as the name
				$this->name = $_FILES['image1']['name'];
				$folder = Yii::getPathOfAlias('application.views.Uploads').'\\';/*Yii::getPathOfAlias("application.themes.classic.assets.images")*/
				//( !file_exists($folder) )?(mkdir ($folder, true) ):'';
				$this->url = $folder.$_FILES['image1']['name'];
				$this->created = time();
				$asset = Assets::model()->findByPk ($id);
				if (count($asset->Images)>2){
						array_push($this->errors,'Maximum number of images reached for this asset.');
				}
				else {
					if ( !move_uploaded_file($_FILES['image1']['tmp_name'], $folder.'/'.$_FILES['image1']['name']) ){
						array_push($this->errors, 'Unable to upload image, please try again!');
					}
				}
			}
			if (empty($this->errors)){
				if ($this->save()){
					Yii::app()->user->setFlash( 'success', 'Success!');
				}
				else if (!$this->save()){
					Yii::app()->user->setFlash( 'warning', 'Something went wrong, save unsuccessfull.' );
				}
			}
			else {
				foreach ( $this->errors as $k => $error ){
					$form->model->addError($k , $error);
				}
				return false;
			}
		}else{
			Yii::app()->user->setFlash('empty', 'Can not upload an empty image!');
		}
    }

}
