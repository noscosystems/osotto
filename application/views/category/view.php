<div class="row">
    <div class="col-xs-12">
        <?php echo CHtml::image($category->catImg, 'Category Image', array('class' => 'img-responsive')); ?>
        <div class="caption">
            <?php echo CHtml::encode($category->name); ?>
        </div>
    </div>
</div>

<br />

<?php if($category->Products): ?>
    <div class="row">
        <?php foreach($category->Products as $product): ?>
            <div class="col-xs-12 col-sm-4 col-md-3">
                <?php echo CHtml::encode(ucwords(strtolower($product->name))); ?>
                <br /><br /><br />
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="jumbotron">
        <div class="container">
            <h1>Oh Snap!</h1>
            <p>Sorry, it seems we have no products to display here just yet. Stay tuned for more though!</p>
        </div>
    </div>
<?php endif; ?>