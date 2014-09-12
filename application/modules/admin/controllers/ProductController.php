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
    use \application\models\form\EditProduct;
    use \application\models\form\FileUplForm;
    use \application\models\form\ListUsers;
    use \application\models\form\Search;

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
                $form = new Form('application.forms.fileUplForm', new FileUplForm);
            else
                $this->redirect(array('/home'));

            $form->model->id=$id;
            $imgs = ProductImages::model()->findAllByAttributes(array('productId' => $id));

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
                else
                    Yii::app()->user->setFlash('emptyImg','Can not upload an empty image.');
            }

            $this->render('ImgUpl', array ('form' => $form, 'images' => $imgs));
        }

        public function ActionDeleteImage($id){

            if(Yii::app()->user->isGuest){
                $this->redirect(array('/login'));
            }
            else if (Yii::app()->user->priv >=50){
            
                $image = ProductImages::model()->findByPk($id);
                
                ( $image->unlinkPath() && $image->delete() ) ?
                    (Yii::app()->user->setFlash('success','Deleted image successfully.'))
                    :(Yii::app()->user->setFlash('warning','Something went wrong, try deleting again.'));
            }
            $this->render('delImg');
        }

        public function actionaddPdf($pdfId)
        {
            if(Yii::app()->user->isGuest)
                $this->redirect(array('/login'));
            else if (Yii::app()->user->priv >=50)
                $form = new Form('application.forms.fileUplForm', New FileUplForm);
            else
                $this->redirect(array('/home'));   

            $pdf = Pdf::model()->findByPk($pdfId);
            $form->model->id = $pdf->id;
            
            if ($form->submitted() && $form->validate()){
                if ($pdf->pdfUpl($form->model,$pdf)){
                    if ($pdf->save())
                        Yii::app()->user->setFlash('UplSuccess','Pdf uploaded successfully.');
                }
            }
            $this->render('addPdf', array('form' => $form ));
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
                    $folder = Yii::getPathOfAlias('application.views.Uploads.images').'/';
                    $cat->catImg = $folder.$_FILES['image1']['name'];

                    if(move_uploaded_file($_FILES['image1']['tmp_name'], $folder.$_FILES['image1']['name'])){
                        ($cat->save())
                            ?(Yii::app()->user->setFlash('catSuccessfullyAdded','Successfully added new category.')):'';
                    }
                }
            }
            $this->render('addProductCategorie', array('form'=>$form));
        }

        public function actionlistProducts()
        {

            if(Yii::app()->user->isGuest)
                $this->redirect(array('/login'));
            else if (Yii::app()->user->priv >=50)
                $form = New Form('application.forms.search', New Search);
            else
                $this->redirect(array('/home'));

            $criteria = new \CDbCriteria;
            $count = Product::model()->count($criteria);
            $pages = new \CPagination( $count );
            $pages->pageSize = 10;
            $pages->applyLimit($criteria);
            $products = Product::model()->findAll($criteria);

            if ($form->submitted() && $form->validate())
                $this->redirect(array('/admin/product/editProduct', 'param' => $form->model->search));

            // ($form)?(array('form'=>$form)):null

            $this->render('listProducts',
                array(
                    'form' => $form,
                    'products' => $products,
                    'pages' => $pages
                )
            );
        }

        public function actioneditProduct($param){
            if(Yii::app()->user->isGuest)
                $this->render('/login');
            else if (Yii::app()->user->priv >=50)
                $form = New Form('application.forms.editProduct', New EditProduct);
            else 
                $this->redirect('/home');

            //$product='';

            if (preg_match('/^[0-9]$/',$param)){
                $product = Product::model()->findByPk($param);
            }
            else if (preg_match('/^[0-9]||[A-z]$/',$param))
                $product = Product::model()->findByAttributes(array('name' => $param));

            $frm = $form->model;
            $frm->attributes = $product->attributes;

            if ($form->submitted() && $form->validate()){

                $product->attributes = $frm->attributes;

                if ($product->save()){
                    Yii::app()->user->setFlash('editSuccess','Product editted successfully.');
                }
            }

            $this->render('editProduct', array( 'form' => $form ));
        }

        public function actiondelProduct(){

            if(Yii::app()->user->isGuest)
                $this->render('/login');
            if (Yii::app()->user->priv >=50){

                if (isset($_POST['id']) && !empty($_POST['id'])) {

                    $product = Product::model()->findByPk($_POST['id']);

                        if ($_POST['butt_value'] == 'Inactive'){
                            $product->active = 0;
                            echo 'Active';
                        }
                        else {
                            $product->active = 1;
                            echo 'Inactive';
                        }
                        $product->save();
                }
            }
            else
                echo 'You do not have the required privilige level for this command.';
        }
	}