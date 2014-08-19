<?php
/* @var $this HomeController */

$this->breadcrumbs=array(
	'Products',
);

?>
<?php $assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets'); ?>
<div class="row">
	<div class="col-md-4">
		<img src="<?php echo $assetUrl; ?>/images/category_tablets.png" class="img-responsive img-rounded" alt="Responsive image">
		<div class="center"><center><h2>Tablets</h2></center></div>
	</div>
	<div class="col-md-4" >
		<img src="<?php echo $assetUrl; ?>/images/category_soundbar.png" class="img-responsive img-rounded" alt="Responsive image">
		<div class="center"><center><h2>Soundbars</h2></center></div>
	</div>
	<div class="col-md-4">
		<img src="<?php echo $assetUrl; ?>/images/category_hifi.png" class="img-responsive img-rounded" alt="Responsive image">
		<div class="center"><center><h2>Hifi</h2></center></div>
	</div>

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