<?php if($product->active): ?>
    <div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="pdfLabel" aria-hidden="true" style="height:100%">
        <div class="modal-dialog modal-lg" style="height:100%">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <iframe width="100%" height="600px" noborder src="<?php echo Yii::app()->assetManager->publish($product->PDF->url); ?>"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="page-header">
                <h1>
                    <?php echo CHtml::encode(ucwords(strtolower($product->name))); ?>
                    <small class="pull-right">
                        <i>Model Number:</i> <?php echo CHtml::encode(strtoupper($product->model_number)); ?>
                    </small>
                </h1>
            </div>
            <strong>
                <?php echo CHtml::encode(ucfirst($product->short_desc)); ?>
            </strong>
            <br /><br />
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="properties">
                <li class="active"><a href="#description" role="tab" data-toggle="tab">Description</a></li>
                <li>
                    <?php if($product->PDF): ?>
                        <?php echo CHtml::link('Specifications', '#pdf', array('data-toggle' => 'modal')); ?>
                    <?php else: ?>
                        <a href="#specs" role="tab" data-toggle="tab">Specifications</a>
                    <?php endif; ?>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="description"><br /><?php echo nl2br($product->long_desc); ?></div>
                <div class="tab-pane" id="specs">
                    <br />
                    <strong><?php echo CHtml::encode($product->spec_brief); ?></strong>
                    <br /><br />
                    <?php echo CHtml::encode($product->spec_full); ?>
                </div>
            </div>

            <script>
                $(function () {
                    $('#properties a:first').tab('show')
                })
            </script>
        </div>
        <div class="col-xs-12 col-sm-6" style="height:300px;">
            <?php if($product->Images): ?>
                <?php if(isset($product->Images[0]) && $image = $product->Images[0]): ?>
                    <?php if(file_exists($image->url)): ?>
                        <?php 
                        echo CHtml::image(
                        Yii::app()->assetManager->publish($image->url), 
                        'Product Image', 
                        array(
                            'class' => 'img-responsive', 
                            'id' => 'imageMainProduct',
                            'style' => 'height:100%;',
                            )
                        ); ?>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(count($product->Images) > 1): ?>
                    <br />
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well well-sm text-center">
                                Click on any image below to enlarge and view
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php foreach($product->Images as $image): ?>
                                <?php 
                                echo CHtml::image(
                                Yii::app()->assetManager->publish($image->url), 
                                'Product Image', 
                                array(
                                    'class' => 'product-image img-responsive',
                                    'style' => 'width:70px; height:70px; float:left; cursor:pointer; border: 1px solid #CCC;'
                                    )
                                ); ?>
                                &nbsp;
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php
    $sql = "SELECT    `product`.*
            FROM      `{{product}}`            AS `product`
            WHERE     
                    `product`.`id` != :id 
                AND `product`.`catId` = :catID 
                AND `product`.`active` = 1 
            ORDER BY `product`.`featured` DESC 
            LIMIT 4; 
            ";
    $relatedProducts = \application\models\db\Product::model()->findAllBySql($sql, array(
        ':id' => $product->id,
        ':catID' => $product->catId,
    ));
    ?>
    <?php if($relatedProducts): ?>
        <div class="page-header">
            <h1>Related Products</h1>
            <div class="row features">
                <?php foreach($relatedProducts as $related): ?>
                    <a href="<?php echo Yii::app()->urlManager->baseUrl; ?>/product/view?id=<?php echo $related->id; ?>">
                        <div class="feature col-xs-12 col-sm-4" style="height:300px; background:#CCC ">
                            <?php if($related->Images && isset($related->Images[0]) && $image = $related->Images[0]): ?>
                                <?php if(file_exists($image->url)): ?>
                                    <?php 
                                    echo CHtml::image(
                                    Yii::app()->assetManager->publish($image->url), 
                                    'Product Image', 
                                    array(
                                        'class' => 'img-responsive',
                                        )
                                    ); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="caption">
                                <?php echo CHtml::encode(ucwords(strtolower($related->name))); ?>
                            </div>
                            <div class="description-hover">
                                <?php echo CHtml::encode(ucfirst($related->short_desc)); ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php // var_dump($product); ?>
<?php else: ?>
    <div class="jumbotron">
        <div class="container">
            <h1>Apologies!</h1>
            <p>This product has been discontinued, if you require support regarding this product, please contact us.</p>
        </div>
    </div>
<?php endif; ?>

<br /><br /><br />
<br /><br /><br />

<script>
$(document).ready( function(){
    $(".product-image").click( function(){
        var src = $(this).attr('src');
        $("#imageMainProduct").attr('src', src);
    })
})
</script>