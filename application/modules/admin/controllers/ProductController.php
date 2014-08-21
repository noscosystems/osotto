<?php

	use \Yii;
    use \CException as Exception;
	use \application\components\Form;
	use \application\components\Controller;
	use \application\components\UserIdentity;
	use \application\models\db\Product;
    use \application\models\db\Option;
    use \application\models\db\ProductCategories;
    use \application\models\db\ProductImages;
    use \application\models\form\AddProduct;
    use \application\models\form\AddProductCategorie;

	class ProductController extends Controller
	{

		public function actionIndex()
		{
			if(Yii::app()->user->isGuest){
                $this->redirect(array('/login'));
            }
            else if (Yii::app()->user->priv >=50){
                $form = new Form('application.forms.addProduct', new AddProduct);
            }
            else {
                $this->redirect(array('/home'));
            }

			$form = new Form('application.forms.addProduct', new AddProduct);
            // $form->model->type = $types;

            if($form->submitted() && $form->validate()) {
            	$product = New Product;
                $productImgs = New ProductImages;
            	$product->attributes = $form->model->attributes;
            	($product->save())?
            		($productImgs->id = $product->id)
            	:'';

            }
			$this->render('index', array ('form' => $form));
		}

        public function actionAddProductCategorie()
        {
            if(Yii::app()->user->isGuest)
                $this->redirect(array('/login'));
            else if (Yii::app()->user->priv >=50)
                $form = new Form('application.forms.addProductCategorie', new AddProductCategorie);
            else
                $this->redirect(array('/home'));

            if ($form->submitted() && $form->validate()){
                $cat = New ProductCategories;
                $cat->attributes = $form->model->attributes;
                $ext = strstr($_FILES['image1']['name'], '.');
                $_FILES['image1']['name'] = substr(md5(time()), 0, 7).$ext;
                $folder = Yii::getPathOfAlias('application.views.Uploads').'\\';
                $cat->catImg = $folder.$_FILES['image1']['name'];
                if ( !move_uploaded_file($_FILES['image1']['tmp_name'], $folder.'/'.$_FILES['image1']['name']) ){
                    echo '<pre>';
                    var_dump($cat->errors);
                    echo '</pre>';
                    exit;
                    $form->model->addError('erro Uploading','Unable to upload image, please try again!');
                }
                else {
                    $cat->save();
                    Yii::app()->user->setFlash('catSuccessfullyAdded','Successfully added new type.');
                }
                // $cat->image_upload($form);
                // exit;
                //($cat->save())?(Yii::app()->user->setFlash('typeSuccessfullyAdded','Successfully added new type.')):'';
            }
            $this->render('AddProductCategorie', array('form'=>$form));
        }
	}