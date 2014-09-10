<?php
/* @var $this HomeController */

    $this->breadcrumbs=array(
        'Home',
    );
?>
    <?php $assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets'); ?>
    <div class="container-fluid" style="margin:0px; padding:0px; width:100%;">
        <div style="height:400px; overflow:hidden; z-index:100;" id="image-cycle" class="carousel slide" data-ride="carousel" data-interval="4000" data-wrap="true">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#image-cycle" data-slide-to="0" class="active"></li>
                <li data-target="#image-cycle" data-slide-to="1"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo $assetUrl; ?>/images/carousel-bg-red-black-white.png" style="height:400px; width:100%" class="img-responsive">
                    <div class="carousel-caption text-center">
                        <center>
                            <?php echo CHtml::image($assetUrl . '/images/logo-small-white.png', 'alt', array('class' => 'img-responsive')); ?>
                        </center>
                        <div class="hidden-xs"><br /><br /><br /></div>
                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo $assetUrl; ?>/images/happy-family.png" style="height:400px; width:100%" class="img-responsive">
                    <div class="carousel-caption" style="left:10%">
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <span class="text-very-dark font-opensans text-large">Meet your soulmate...</span>
                                <br />
                                <span class="text-very-dark font-opensans text-medium">Beautiful, slim and amazing.</span>
                            </div>
                        </div>
                        <div class="hidden-xs"><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#image-cycle" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#image-cycle" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>

        <div class="row features">
            <div class="feature col-xs-12 col-sm-6">
                <?php echo CHtml::image($assetUrl . '/images/hifi-frontpage.png', 'alt', array('class' => 'img-responsive')); ?>
                <div class="caption">
                    HiFi Speakers
                    <div class="description">
                        Discover our top of the range HiFi Speakers, great and affordable!
                    </div>
                </div>
            </div>
            <div class="feature col-xs-12 col-sm-6">
                <?php echo CHtml::image($assetUrl . '/images/soundbar-frontpage.png', 'alt', array('class' => 'img-responsive')); ?>
                <div class="caption">
                    Soundbars
                    <div class="description">
                        See our amazing collection of soundbars!
                    </div>
                </div>
            </div>
        </div>
        <div class="row features">
            <div class="feature col-xs-12 col-sm-6">
                <?php echo CHtml::image($assetUrl . '/images/tablet-frontpage.png', 'alt', array('class' => 'img-responsive')); ?>
                <div class="caption">
                    Tablets
                    <div class="description">
                        High performance tablets, at your service.
                    </div>
                </div>
            </div>
            <div class="feature col-xs-12 col-sm-6">
                <?php echo CHtml::image($assetUrl . '/images/register-frontpage.png', 'alt', array('class' => 'img-responsive')); ?>
                <div class="caption">
                    Register Your Device
                    <div class="description">
                        Be covered by the warranty if anything was to happen.
                    </div>
                </div>
            </div>
        </div>
    </div>