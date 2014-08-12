<?php

$form->attributes = array('class' => 'form-horizontal');
echo $form->renderBegin();
$widget = $form->activeFormWidget;
?>

<div class="page-header">
    <h1>Product addition <small>Please enter your product's details</small></h1>
</div>

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
    <div class="col-sm-3 control-label">Select device type:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'type', array('class' => 'form-control') ); ?>
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
    <div class="col-sm-3 control-label">Enter description for your device:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'purchased_from', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Enter device specs:</div>
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

<script>
    var myButton = document.getElementById('application_models_form_RegDev_type');    
    var mySelect = document.getElementById('mySelect');
    
    myButton.onchange = function (){
        var xmlhttp = createXMLHttpObj();

        xmlhttp.open('POST','<?php echo Yii::app()->baseUrl; ?>'+'/device/sendArray',false);
        xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');

        do {
            xmlhttp.send('send='+myButton.value);
        }while(xmlhttp.readyState!=4 && xmlhttp.status!=200);
        
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            var cars=[];
            cars = jQuery.parseJSON(xmlhttp.responseText);

            for (var i=0; i<cars.length; i++)
                mySelect.innerHTML += '<option value='+cars[i]+'>'+cars[i]+'</option>';
        }
        // return false;
    }
    function createXMLHttpObj(){
        return (window.XMLHttpRequest)?(new XMLHttpRequest()):(new ActiveXObject('Microsoft.XMLHTTP'));
    }

</script>