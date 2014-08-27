<?php
/* @var $this ProductController */

$this->breadcrumbs=array(
	'Products',
);

?>

<?php 
    $assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets/images');
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
            <img src="<?php echo $assetMgr->publish($categorie->catImg); ?>" class="MyClickable img-responsive img-rounded" alt="Responsive image" name="<?php echo $categorie->id; ?> "title="<?php echo $categorie->name; ?>">
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

                                

                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-warning">There are no other contacts to display</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div id="myDiv">
        <img src='<?php echo $assetUrl; ?>/ajax.gif' alt='Your browseer does not support images' id="ajax">
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
        var tbody = document.getElementsByTagName('tbody');

///***************************************************************************************************************
        for (var j=0; j<clicked.length; j++){
            clicked[j].onclick = function (){

                var xmlhttp = createXMLHttpObj();

                if ( xmlhttp.readyState!=4 && xmlhttp.status!=200 ){
                    myDiv.style.display = 'inline';
                }

                do {
                    xmlhttp.open('POST','<?php echo Yii::app()->baseUrl;?>'+'/product/sendArray',false);
                    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                    xmlhttp.send('send='+this.name);
                }while(xmlhttp.readyState!=4 && xmlhttp.status!=200);
                
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    myDiv.style.display = 'none';
                    var products=[];
                    tr = [];
                    td = [];
                    txt = [];

                    products =  JSON.parse(xmlhttp.responseText);
                    


                    for (var i=0; i<products.length; i++){
                            tr[i] = document.createElement('TR');
                        for (var j=0; j<products[i].length; j++){
                                                        
                            console.log(products[i][j]);

                            td[j] = document.createElement('TD');
                            txt[j] = document.createTextNode(products[i][j]);
                            txt1 = document.createTextNode(products[i]['short_desc']);
                            tbody[0].appendChild(tr[i]);
                            tr[i].appendChild(td[j]);
                            td[j].appendChild(txt[j]);
                            // tbody[0].appendChild(tr);
                            // tr.appendChild(td);
                            // td.appendChild(txt1);
                            // tr.innerHTML = td;
                            // td.innerHTML = products[i]['model_number'];

                        }
                    }
                }
                return false;
                // alert(this.title);
            };

        }
//***************************************************************************************************************/
        function createXMLHttpObj(){
            return (window.XMLHttpRequest)?(new XMLHttpRequest()):(new ActiveXObject('Microsoft.XMLHTTP'));
        }

    </script>