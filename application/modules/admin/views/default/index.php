<?php 
/**
Pavel:

Try to stick to proper naming conventions, I've noticed that you are a bit messy when it comes to naming a process.
For example you have a lot in the product controller, you should of split it into categories and products.
The way I would have structured this would have been as follows:

Syntax:
 - ControllerName {
    ActionName(Params)
    ActionName(Params)
 }

 - User {
    Add
    Edit(id)
    List
 }
 - Product {
    Add
    Edit(id)
    List
 }
 - Category {
    Add
    Edit(id)
    List
 }

Can you see the uniformity here? Easy to navigate as a developer, also looks slightly more professional, its just a thought for the future.
**/
?>
<br />
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4"><span class="btn btn-link" style="color:#000;">Category</span></div>
                    <div class="col-xs-8 text-right">
                        <div class="btn-group">
                            <?php echo CHtml::link('Add', array('/admin/product/addproductcategorie'), array('class' => 'btn btn-success')); ?>
                            <?php echo CHtml::link('Edit', array('/admin/category/edit'), array('class' => 'btn btn-warning disabled')); ?>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-xs-4"><span class="btn btn-link" style="color:#000;">Product</span></div>
                    <div class="col-xs-8 text-right">
                        <div class="btn-group">
                            <?php echo CHtml::link('Add', array('/admin/product/index'), array('class' => 'btn btn-success')); ?>
                            <?php echo CHtml::link('Edit', array('/admin/product/listproducts'), array('class' => 'btn btn-warning')); ?>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-xs-4"><span class="btn btn-link" style="color:#000;">User</span></div>
                    <div class="col-xs-8 text-right">
                        <div class="btn-group">
                            <?php echo CHtml::link('Add', array('/admin/user/add'), array('class' => 'btn btn-success disabled')); ?>
                            <?php echo CHtml::link('Edit', array('/admin/account/listusers'), array('class' => 'btn btn-warning')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="jumbotron" style="padding: 40px">
            <div class="container">
                <h1>Administration</h1>
                <p>Please select a function from <span class="hidden-xs">the left.</span><span class="visible-xs">above.</span></p>
            </div>
        </div>
    </div>
</div>