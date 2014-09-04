<?php
// Add the namespace here:
namespace application\models\db;
// Along with the correct "use"'s/
use \Yii;
use \CException;
use \application\components\ActiveRecord;
/**
 * This is the model class for table "product_images".
 *
 * The followings are the available columns in table 'product_images':
 * @property integer $id
 * @property integer $productId
 * @property string $url
 *
 * The followings are the available model relations:
 * @property Product $product
 */
class ProductImages extends ActiveRecord
{

	public $errors = [];

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_images';
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
			array('url', 'length', 'max'=>100),
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
			'product' => array(self::BELONGS_TO, '\\application\\models\\db\\Product', 'productId'),
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
	 * @return ProductImages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function image_upload(){
        //2 097 152 = 2MegaBytes;
        $allowed_img_types = Array('image/jpeg','image/png');	//allowed image types, stored in an array
        //$mime_type = image_type_to_mime_type(exif_imagetype($_FILES['image1']['tmp_name']));
        $size = [];
		if ($_FILES['image1']['size']>0 && $_FILES['image1']['type']!='' && $_FILES['image1']['tmp_name']!=''){
			$size = getimagesize($_FILES['image1']['tmp_name']);

			if (!in_array($size['mime'],$allowed_img_types)){ // Checking wether the image is of the allowed image types
				array_push($this->errors, 'Image not of allowed type. Allowed image types are jpeg, bmp and png!');
			}
			else if ($size[0]>2664 || $size[1]>1998 || $_FILES['image1']['size']>5242880){

				$folder = Yii::getPathOfAlias('application.views.Uploads.images').'//';
				$ext = strstr($_FILES['image1']['name'], '.');
				$src='';

				switch ($size['mime']){
					case 'image/jpeg':{

						$src = imagecreatefromjpeg($_FILES['image1']['tmp_name']); // Source image 
						$sw = imagesx($src); // Source image Width
						$sh = imagesy($src); // Source image Height

						$dw = 2664; // Destination image Width 
						$dh = 1998; // Destination image Height
						
						$wr = $sw / $dw; // Width Ratio (source:destination)
						$hr = $sh / $dh; // Height Ratio (source:destination)
						
						$cx = 0; // Crop X (source offset left) 
						$cy = 0; // Crop Y (source offset top)
						
						if ($hr < $wr){ // Height is the limiting dimension;adjust Width 
						
							$ow = $sw; // Old Source Width (temp)
							$sw = $dw * $hr; // New virtual Source Width
							
							$cx = ($ow - $sw) / 2; // Crops source width; focus remains centered
						}
						if ($wr < $hr){ // Width is the limiting dimension; adjust Height
						
							$oh = $sh; // Old Source Height (temp)
							$sh = $dh * $wr; // New virtual Source Height
							
							$cy = ($oh - $sh) / 2; // Crops source height; focus remains centered
						} 
						// If the width ratio equals the height ratio, the dimensions stay the same. 
						
						$dst = imagecreatetruecolor($dw, $dh); // Destination image
						imagecopyresampled($dst, $src, 0, 0, $cx, $cy, $dw, $dh, $sw, $sh); // Previews the resized image (not saved)
						$name = substr(md5(time()), 0, 7).$ext;
						$this->url = $folder.$name;
						imagejpeg($dst, $folder.$name , 95);
						return true;
						break;
					}
					case 'image/png':{
						$src = imagecreatefrompng($_FILES['image1']['tmp_name']); // Source image 
						$sw = imagesx($src); // Source image Width
						$sh = imagesy($src); // Source image Height

						$dw = 2664; // Destination image Width 
						$dh = 1998; // Destination image Height
						
						$wr = $sw / $dw; // Width Ratio (source:destination)
						$hr = $sh / $dh; // Height Ratio (source:destination)
						
						$cx = 0; // Crop X (source offset left) 
						$cy = 0; // Crop Y (source offset top)
						
						if ($hr < $wr){ // Height is the limiting dimension;adjust Width 
						
							$ow = $sw; // Old Source Width (temp)
							$sw = $dw * $hr; // New virtual Source Width
							
							$cx = ($ow - $sw) / 2; // Crops source width; focus remains centered
						}
						if ($wr < $hr){ // Width is the limiting dimension; adjust Height
						
							$oh = $sh; // Old Source Height (temp)
							$sh = $dh * $wr; // New virtual Source Height
							
							$cy = ($oh - $sh) / 2; // Crops source height; focus remains centered
						} 
						// If the width ratio equals the height ratio, the dimensions stay the same. 
						
						$dst = imagecreatetruecolor($dw, $dh); // Destination image
						imagecopyresampled($dst, $src, 0, 0, $cx, $cy, $dw, $dh, $sw, $sh); // Previews the resized image (not saved)
						$name = substr(md5(time()), 0, 7).$ext;
						$this->url = $folder.$name;
						imagepng($dst, $folder.$name , 9);
						return true;
						break;
					}
					 default:
                		return false;
				}
				
			}
			else{
				$ext = strstr($_FILES['image1']['name'], '.');
				$_FILES['image1']['name'] = substr(md5(time()), 0, 7).$ext;	//sets a name based on crrent time
				//then md5's it :D and get's a part of the string as the name
				$folder = Yii::getPathOfAlias('application.views.Uploads').'/';
				$this->url = $folder.$_FILES['image1']['name'];
					if ( !move_uploaded_file($_FILES['image1']['tmp_name'], $this->url) )
						array_push($this->errors, 'Unable to upload image, please try again!');
				return true;
			}
		}else{
			Yii::app()->user->setFlash('empty', 'Can not upload an empty image!');
		}
    }

}
