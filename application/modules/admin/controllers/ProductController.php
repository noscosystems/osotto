<?php

	use \Yii;
    use \CException as Exception;
	use \application\components\Form;
	use \application\components\Controller;
	use \application\components\UserIdentity;
	use \application\models\db\Product;
	use \application\models\form\AddProduct;

	class ProductController extends Controller
	{

		public function actionIndex()
		{
			// if(Yii::app()->user->isGuest){
   //              $this->redirect(array('/login'));
   //          }
   //          else if (Yii::app()->user->priv >=50){
   //              $form = new Form('application.forms.addProduct', new AddProduct);
   //          }
   //          else {
   //              $this->redirect(array('/home'));
   //          }

			$form = new Form('application.forms.addProduct', new AddProduct);

            if($form->submitted() && $form->validate()) {
            	'Chyeaaaaaaaaaa, form submitted and validated';
            	$product = New Product;
            	$product->attributes = $form->model->attributes;
            	$product->save();
            }
			$this->render('index', array ('form' => $form));
		}
	}