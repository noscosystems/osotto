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
    use \application\models\db\Pdf;
    use \application\models\form\AddProduct;
    use \application\models\form\AddProductCategorie;
    use \application\models\form\ImgForm;
    use \application\models\form\ListUsers;

	class ProductController extends Controller
	{

		public function actionIndex()
		{
			if(Yii::app()->user->isGuest)
                $this->redirect(array('/login'));
            else if (Yii::app()->user->priv >=50)
                $form = new Form('application.forms.addProduct', new AddProduct);
            else
                $this->redirect(array('/home'));

            if($form->submitted() && $form->validate()) {
                $frm = $form->model;
                $productExists = Product::model()->findAllByAttributes(array('name' => $frm->name));
                if ($productExists){
                    $frm->addError('name exists','Product with this name already exists!');
                }
                else{
                	$product = New Product;
                    $productImg = New ProductImages;
                    $productPDF = New Pdf;
                	$product->attributes = $frm->attributes;
                    $pdfMoved = '';

                    if (isset($_FILES['pdf'])){
                        if ($_FILES['pdf']['size']>0 && $_FILES['pdf']['type'] == 'application/pdf'){
                            $ext = strstr($_FILES['pdf']['name'], '.');
                            $_FILES['pdf']['name'] = substr(md5(time()), 0, 7).$ext;
                            $productPDF->url = $dest = Yii::getPathOfAlias('application.views.Uploads.pdfs').'\\'.$_FILES['pdf']['name'];
                            $pdfMoved = move_uploaded_file($_FILES['pdf']['tmp_name'], $dest);
                        }
                        else{
                            $frm->addError('pdfErro','File uploader empty or file is not a pdf.');
                        }
                    }

                    if (empty($frm->errors) && $productImg->image_upload() && $pdfMoved ){
                        if (!$product->save()){
                            $frm->addError('productNotSaved','Something went wrong, product not saved.');
                        }
                        else {
                            $productImg->productId = $productPDF->productId = $product->id;

                                if (empty($productImg->errors)){

                                    if ($productImg->save() && $productPDF->save()){
                                        Yii::app()->user->setFlash('additionSuccessfull','Adding product success.');
                                        $this->redirect(array('/admin/product/ImgUpl', 'id' => $productImg->productId));
                                    }
                                    else {
                                        foreach ( $productImg->errors as $k => $error )
                                            $frm->addError($k , $error);
                                    }
                                }
                        }
                    }

                }
            }
			$this->render('index', array ('form' => $form));
        }

        public function actionImgUpl($id)
        {
            if(Yii::app()->user->isGuest)
                $this->redirect(array('/login'));
            else if (Yii::app()->user->priv >=50)
                $form = new Form('application.forms.imgForm', new ImgForm);
            else
                $this->redirect(array('/home'));

            $form->model->id=$id;

            if ($form->submitted() && $form->validate()){
                if (isset($_FILES['image1']) && $_FILES['image1']['size']>0){
                    $productImg = new ProductImages;
                    $productImg->productId = $id;
                        if ($productImg->image_upload()){
                            if (empty($productImg->errors)){
                                if ($productImg->save()){
                                    Yii::app()->user->setFlash('SuccessUpl','Successfully uploaded image.');
                                    $this->redirect(array('/admin/product/ImgUpl', 'id' => $productImg->productId));
                                }
                                else {
                                    foreach ( $productImg->errors as $k => $error )
                                        $form->model->addError($k , $error);
                                }
                            }
                        }
                }
                else{
                    Yii::app()->user->setFlash('emptyImg','Can not upload an empty image.');
                }
            }

            $this->render('ImgUpl', array ('form' => $form));
        }

        public function actionaddProductCategorie()
        {
            if(Yii::app()->user->isGuest)
                $this->redirect(array('/login'));
            else if (Yii::app()->user->priv >=50)
                $form = new Form('application.forms.addProductCategorie', new AddProductCategorie);
            else
                $this->redirect(array('/home'));

            if ($form->submitted() && $form->validate()){
                $frm = $form->model;
                $catExists = ProductCategories::model()->findAllByAttributes(array('name' => $frm->name));
                if($catExists){
                    $frm->addError('username', 'The username specified is already taken! Please choose another.');
                }
                else{
                    $cat = New ProductCategories;
                    $cat->attributes = $form->model->attributes;

                    $ext = strstr($_FILES['image1']['name'], '.');
                    $_FILES['image1']['name'] = substr(md5(time()), 0, 7).$ext;
                    $folder = Yii::getPathOfAlias('application.views.Uploads').'/';
                    $cat->catImg = $folder.$_FILES['image1']['name'];

                    if(move_uploaded_file($_FILES['image1']['tmp_name'], $folder.$_FILES['image1']['name'])){
                        ($cat->save())
                            ?(Yii::app()->user->setFlash('catSuccessfullyAdded','Successfully added new category.')):'';
                    }
                }
            }
            $this->render('addProductCategorie', array('form'=>$form));
        }

        public function actionlistUsers(){
            if(Yii::app()->user->isGuest){
                $this->redirect(array('/login'));
            }
            else if (Yii::app()->user->priv >=50){
                $form = New Form('application.forms.listusers', New ListUsers);
            }
            else {
                $this->redirect(array('/home'));
            }
            
            $criteria = new \CDbCriteria;
            $count = Users::model()->count($criteria);
            $pages = new \CPagination( $count );
            $pages->pageSize = 10;
            $pages->applyLimit($criteria);
            $users = Users::model()->findAll($criteria);

            if ($form->submitted() && $form->validate()){
                $found_user = Users::model()->findByAttributes(array('username' => $form->model->search));
                $this->redirect (array('/admin/user', 'id' => $found_user->id));
            }
            $this->render('listusers', array('form'=>$form,
                                         'pages' => $pages,
                                         'users' => $users
                                         )
            );
        }
	}