<?php
/* @var $this ProductController */

$this->breadcrumbs=array(
	'Products',
);

?>

<?php 
    //$assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets');
    //This is not needed anymore as images are stored in another folder.
?>
<?php
//Commenting out the static way of showing things, leaving in a comment, just for comparison.
//Picture are now loaded accordingly to the categorie from the db upon the page loading.
/************************* 
<div class="row">
	<div class="col-md-4" >
		<img src="<?php echo $assetUrl; ?>/images/category_tablets.png" class="MyClickable img-responsive img-rounded" alt="Responsive image" title="Tablets" id="1">
		<div class="center"><center><h2>Tablets</h2></center></div>
	</div>
	<div class="col-md-4" >
		<img src="<?php echo $assetUrl; ?>/images/category_soundbar.png" class="MyClickable img-responsive img-rounded" alt="Responsive image" title="Soundbars" id="2">
		<div class="center"><center><h2>Soundbars</h2></center></div>
	</div>
	<div class="col-md-4">
		<img src="<?php echo $assetUrl; ?>/images/category_hifi.png" class="MyClickable img-responsive img-rounded" alt="Responsive image" title="Hifi" id="3">
		<div class="center"><center><h2>Hifi</h2></center></div>
	</div>

</div>
****************************/
?>
<?php
    $assetMgr = Yii::app()->assetManager; //->publish(Yii::app()->theme->basePath . '/assets'); 
    //Just to use as a shortcut for better code readability.
    // var_dump(Yii::app()->baseUrl);
    // var_dump(Yii::getPathOfAlias('osotto.public_html.product'));
?>
<div class="row">
    <?php foreach ($categories as $categorie): ?>
        <div class="col-md-4" >
            <img src="<?php echo $assetMgr->publish($categorie->catImg); ?>" class="MyClickable img-responsive img-rounded" alt="Responsive image" title="<?php echo $categorie->id; ?>">
            <div class="center"><center><h2><?php echo $categorie->name; ?></h2></center></div>
        </div>
    <?php endforeach; ?>
</div>


<div class="panel-group" id="customerDetailsAccordian">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#customerDetailsAccordian" href="#contactDetails">Products&nbsp;
                <span class="glyphicon glyphicon-arrow-down"></span>
                <span class="badge badge-primary pull-right"><?php echo '.....'; ?></span></a>
           </h4>
        </div>
        <div id="contactDetails" class="panel-collapse collapse">
            <div class="panel-body">
                <?php $x= '1'; if($x > 0): ?>
                    <!--<div class="alert alert-info">Contact records are displayed from <strong>newest</strong> to <strong>oldest</strong>.</div> -->
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Modle Number</th>
                                <th>Brief Description</th>
                                <th></th>
       
                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <td><?php // echo CHtml::encode(substr_replace($customer->Contact->mobile," ", 5, -strlen($contact->mobile))); ?></td>
                                    <td><?php // echo  CHtml::encode(substr_replace($customer->Contact->home," ", 5, -strlen($contact->home))); ?></td>
                                    <td><span class="badge badge-primary pull-right"><?php echo 'View details'; ?></span></td>
        
                                </tr>

                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-warning">There are no other contacts to display</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div id="myDiv">
        <img src='<?php echo Yii::getPathOfAlias('application.views.product');?>\ajax.gif' alt='Your browseer does not support images' id="ajax">
    </div>
    <style>
        #ajax{
            position:absolute;
            top: 50%;
            left: 50%;
            margin-top: -178px;
            margin-left: -178px;
        }
        #myDiv{
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:#000;
            opacity:0.5;
            display:none;
        }
    </style>
    <script>
        var clicked = document.getElementsByClassName('MyClickable');
        var myDiv = document.getElementById('myDiv');


        for (var j=0; j<clicked.length; j++){
            clicked[j].onclick = function (){

                var xmlhttp = createXMLHttpObj();

                do {
                    xmlhttp.open('POST','<?php echo Yii::app()->baseUrl;?>'+'/product/sendArray',false);
                    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                    xmlhttp.send('send='+this.title);
                }while(xmlhttp.readyState!=4 && xmlhttp.status!=200);

                if (xmlhttp.readyState!=4 && xmlhttp.status!=200){
                    myDiv.style.display = 'inline';
                }
                
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    myDiv.style.display = 'none';
                    var products=[];
                    products =  JSON.parse(xmlhttp.responseText);
                    
                    for (var i=0; i<products.length; i++){
                        console.log(products[i]['id']);
                    }
                }
                return false;
                // alert(this.title);
            };
        }

        function createXMLHttpObj(){
            return (window.XMLHttpRequest)?(new XMLHttpRequest()):(new ActiveXObject('Microsoft.XMLHTTP'));
        }

    </script>