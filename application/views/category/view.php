<?php
    $assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets');
?>
<div class="container-fluid" style="margin:0px; padding:0px; width:100%;">
    <div class="row features">
        <div class="feature col-xs-12" style="height:200px; background:#CCC">
            <?php if($category->catImg && file_exists($category->catImg)): ?>
                <?php echo CHtml::image(Yii::app()->assetManager->publish($category->catImg), 'Category Image', array('class' => 'img-responsive')); ?>
            <?php endif; ?>
            <div class="caption">
                <?php echo CHtml::encode($category->name); ?>'s
            </div>
        </div>
    </div>

    <br />

    <?php if($category->Products): ?>
        <div class="row features">
            <?php $i = 0; ?>
            <?php foreach($category->Products as $product): ?>
                <?php $i++; ?>
                <?php if($i > 0 && $i % 3 == 1): ?>
                    </div><div class="row features">
                <?php endif; ?>
                <a href="<?php echo Yii::app()->urlManager->baseUrl; ?>/product/view?id=<?php echo $product->id; ?>">
                    <div class="feature col-xs-12 col-sm-4" style="height:300px; background:#CCC ">
                        <?php if($product->Images && isset($product->Images[0]) && $image = $product->Images[0]): ?>
                            <?php if(file_exists($image->url)): ?>
                                <?php echo CHtml::image(Yii::app()->assetManager->publish($image->url), 'Product Image', array('class' => 'img-responsive')); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="caption">
                            <?php echo CHtml::encode(ucwords(strtolower($product->name))); ?>
                        </div>
                        <div class="description-hover">
                            <?php echo CHtml::encode(ucfirst($product->short_desc)); ?>
                        </div>
                    </div>
                </a>
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
</div>