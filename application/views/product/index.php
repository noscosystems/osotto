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



<div class="panel-group" id="customerDetailsAccordian">
    <div class="panel panel-default">
        <div class="accordion-toggle panel-heading" data-toggle="collapse" data-parent="#customerDetailsAccordian" href="#contactDetails">
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
                    <table class="table table-striped"> 
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Model Number</th>
                                <th>Brief Description</th>
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

<!-- <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->

<!-- Modal -->
<div class="col-md-12">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" center>
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div> -->
      <div class="modal-body">
        <!-- <button type="button" class="glyphicon glyphicon-remove-circle" data-dismiss="modal"></button> -->
        <span class="glyphicon glyphicon-remove-circle pull-right" data-dismiss="modal"></span>
        <iframe src=""></iframe>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
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
        .modal-dialog{
            width:100%;
        }
        .modal-body{
            /*height:100%;*/
            height:750px;
            max-height:1024px;
            background:#000;
        }
        .glyphicon{
            color:white !important;
        }
        .glyphicon:hover{
            cursor:pointer;
        }
        tr.collapse.in{
            display:table-row !important;
        }
        iframe{
            width:100%;
            height:100%;
            overflow:hidden;
        }
    </style>
    <script>
        var clicked = document.getElementsByClassName('MyClickable');
        var myDiv = document.getElementById('myDiv');
        var tbody = document.getElementsByTagName('tbody');
        var iframe = document.getElementsByTagName('iframe');

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
                    a = [];

                    products =  JSON.parse(xmlhttp.responseText);
                    
                    tbody[0].innerHTML = '';

                    for (var i=0; i<products.length; i++){ //Loop that rotates overall number of products.
                        for (var j=0; j<products[i].length; j++){ // Loop for creating table rows
                            console.log('Value of j is: '+j);
                                tr[j] = document.createElement('TR');
                            if (j==0){ //If row is first  add accordion href
                                tr[j].setAttribute('data-toggle','collapse');
                                tr[j].setAttribute('data-parent','#accordion');
                                tr[j].setAttribute('href','.collapse'+i);
                                tr[j].setAttribute('title','Click for additional info.');
                                tr[j].setAttribute('style','z-index:2;');
                                //tr[j].setAttribute('onclick','document.getElementById("'+i+'").style.display = "table-row";' );
                            }
                            else {
                                tr[j].setAttribute('class','collapse'+i+' panel-collapse collapse');
                                tr[j].setAttribute('style','z-index:1;');
                                //tr[j].setAttribute('id',i);
                            }
                            for (var k=0; k<products[i][j].length; k++){ // Loop for creating table columns ( tds ) and adding info to them.
                                // console.log(products[i][j]);
                                console.log('VALUE OF K IS: '+k);
                                //data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class=""

                                //tr[j] = document.createElement('TR');
                                td[k] = document.createElement('TD');
                                tbody[0].appendChild(tr[j]);
                                tr[j].appendChild(td[k]);
                                // else if (k==0){
                                //     txt[k] = document.createTextNode(products[i][j][k]);
                                //     td[k].appendChild(txt[k]);
                                //     td[k].setAttribute('style','overflow:hidden;');
                                //     td[k].setAttribute('onmouseover','this.style.overflow="auto"; this.style.width="auto"; this.style.height = "auto"');
                                // }
                                if (k==2 && j==1) {
                                    a[k] = document.createElement('A');
                                    a[k].setAttribute('href', '#myModal');
                                    a[k].setAttribute('data-toggle','modal');
                                    a[k].setAttribute('class','btn btn-danger btn-xs');
                                    a[k].setAttribute('onclick', 'return iframe[0].src="'+products[i][j][k]+'";')
                                    // iframe[0].src = products[i][j][k];
                                    //a[k].setAttribute('target','_blank');
                                    var anch = document.createTextNode('View');
                                    a[k].appendChild(anch);
                                    td[k].appendChild(a[k]);   
                                }
                                else if (k==1 && j==1){
                                    a[k] = document.createElement('A');
                                    a[k].setAttribute('target', '_blank');
                                    a[k].setAttribute('href', products[i][j][k]);
                                    a[k].setAttribute('class','btn btn-danger btn-xs');
                                    var anch = document.createTextNode('View/Download PDF');
                                    a[k].appendChild(anch);
                                    td[k].appendChild(a[k]);
                                }
                                else{
                                    txt[k] = document.createTextNode(products[i][j][k]);
                                    td[k].appendChild(txt[k]);
                                }
                                // txt1 = document.createTextNode(products[i]['short_desc']);
                            }

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