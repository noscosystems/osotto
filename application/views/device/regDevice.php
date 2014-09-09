<?php

$form->attributes = array('class' => 'form-horizontal');
echo $form->renderBegin();
$widget = $form->activeFormWidget;
?>

<div class="page-header">
    <h1>Product registration <small>Please enter your product's details</small></h1>
</div>

<?php if(Yii::app()->user->hasFlash('registerSuccess')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('registerSuccess'); ?>
    </div>
<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('regDevSuccess')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('regDevSuccess'); ?>
    </div>
<?php endif; ?>

<?php
if($widget->errorSummary($form)){
    echo '<div class="alert alert-danger">' . $widget->errorSummary($form) . '</div>';
}
?>
<div class="row">
    <div class="col-sm-3 control-label">Select device category:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'type', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Select your device:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'productId', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Enter your device's serial number:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'serial_number', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Enter MAC address of your device if you know it/ there is any:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'MAC', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Device purchased from:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'purchased_from', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Date of purchase:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'date_purchased', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-2 col-sm-offset-3">
        <?php echo $widget->button($form, 'submit', array('class' => 'btn btn-lg btn-success') ); ?>
    </div>
</div>
<?php echo $form->renderEnd(); ?>
<!-- form -->
<?php
    $path = Yii::app()->assetManager->publish(Yii::getPathOfAlias('composer.twbs.bootstrap.dist'));
?>
<script type="text/javascript" src="<?php echo $path;?>/js/jquery-ui.js"></script>
<link href="<?php echo $path; ?>/js/jquery-ui.css" rel="stylesheet" type="text/css" />
<script>

    $(function() {
        $( "#application_models_form_RegDev_date_purchased" ).datepicker();
    });

    var myButton = document.getElementById('application_models_form_RegDev_type');
    var mySelect = document.getElementById('application_models_form_RegDev_productId');
    var body = document.getElementsByTagName('body');

    myButton.onchange = function (){

        var xmlhttp = createXMLHttpObj();
        // if(xmlhttp.readyState==4 && xmlhttp.status==200){
        //     body.innerHTML='<div style="top:0; left:0; background:#000;"><img src=\'\' style=\'top: 50%; left: 50%; margin-top: -10px; margin-left: -10px; z-index:100;\' ></div>'
        // }
        do {
            xmlhttp.open('POST','<?php echo Yii::app()->baseUrl;?>/device/sendArray',false);
            xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
            xmlhttp.send('send='+myButton.value);
        }while(xmlhttp.readyState!=4 && xmlhttp.status!=200);
        
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            var products = [];
            products =  JSON.parse(xmlhttp.responseText);
            
            mySelect.innerHTML = '';

            for (var i=0; i<products.length; i++)
                mySelect.innerHTML += '<option value='+products[i]['id']+'>'+products[i]['name']+'</option>';
        }
        return false;
    }

    body[0].onload = function (){

        var xmlhttp = createXMLHttpObj();
        // if(xmlhttp.readyState==4 && xmlhttp.status==200){
        //     body.innerHTML='<div style="top:0; left:0; background:#000;"><img src=\'\' style=\'top: 50%; left: 50%; margin-top: -10px; margin-left: -10px; z-index:100;\' ></div>'
        // }
        if (myButton.value!='Please Select'){
            do {
                xmlhttp.open('POST','<?php echo Yii::app()->baseUrl;?>'+'/device/sendArray',false);
                xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                xmlhttp.send('send='+myButton.value);
            }while(xmlhttp.readyState!=4 && xmlhttp.status!=200);
        }
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            var products = [];
            products =  JSON.parse(xmlhttp.responseText);
            
            mySelect.innerHTML = '';

            for (var i=0; i<products.length; i++)
                mySelect.innerHTML += '<option value='+products[i]['id']+'>'+products[i]['name']+'</option>';
        }
        return false;
    }

    function createXMLHttpObj(){
        return (window.XMLHttpRequest)?(new XMLHttpRequest()):(new ActiveXObject('Microsoft.XMLHTTP'));
    }

</script>