<?php

	use \Yii;
    use \CException as Exception;
	use \application\components\Form;
	use \application\components\Controller;
	use \application\components\UserIdentity;
	use \application\models\db\Product;
    use \application\models\db\Option;
	use \application\models\form\AddProduct;
    use \application\models\form\AddProductType;

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
            	$product->attributes = $form->model->attributes;
            	($product->save())?
            		(Yii::app()->user->setFlash('additionSuccessfull','Device added successfully into the database.'))
            	:'';
            }
			$this->render('index', array ('form' => $form));
		}

        public function actionAddProductType()
        {
            if(Yii::app()->user->isGuest)
                $this->redirect(array('/login'));
            else if (Yii::app()->user->priv >=50)
                $form = new Form('application.forms.addProductType', new AddProductType);
            else
                $this->redirect(array('/home'));

            if ($form->submitted() && $form->validate()){
                $opt = New Option;
                $opt->column = 'type';
                $opt->table = 'product';
                $opt->attributes = $form->model->attributes;
                ($opt->save())?(Yii::app()->user->setFlash('typeSuccessfullyAdded','Successfully added new type.')):'';
            }
            $this->render('AddProductType', array('form'=>$form));
        }
	}