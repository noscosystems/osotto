<?php
$assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets');
?>
<div class="row">
    <div class="col-xs-12">
        <?php echo CHtml::image($assetUrl . '/images/mh51-banner.png', 'MH51 Banner', array('class' => 'img-responsive')); ?>
    </div>
</div>
<br /><br /><br /><br /><br />
<div class="row">
    <div class="col-xs-12 text-center">
        <span class="font-opensans text-large text-very-dark text-shadow-light">
            With Great Power, Comes Great Sound Quality
        </span>
        <br />
    </div>
</div>

<br /><br /><br /><br /><br />
<div class="row">
    <div class="col-sm-4">
        <?php echo CHtml::image($assetUrl . '/images/mh51-side-right.png', 'Right side of MH51', array('class' => 'img-responsive')); ?>
    </div>
    <div class="col-sm-8">
        <div class="well">
            <span class="font-opensans text-medium-large text-very-dark text-shadow-light">
                Not Just a Sound System
            </span>
            <br />
            <p class="text-small">
                The MH51 comes with two microphone in jacks, allowing you to convert this HiFi to a Karaoke machine!<br />
                The CD drive, USB slots, SD card slot and Bluetooth allows you to never be short of connectivity options.
            </p>
        </div>
    </div>
</div>

<br /><br /><br /><br /><br />
<div class="row">
    <div class="col-xs-12">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" style="background: #333; width:100%;" role="tablist">
                <li role="presentation" class="active"><a href="#about" aria-controls="about" role="tab" data-toggle="tab" style="color: #000">About The MH51</a></li>
                <li role="presentation"><a href="#tech" aria-controls="tech" role="tab" data-toggle="tab" style="color: #000">Technical Specification</a></li>
                <li role="presentation"><a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab" style="color: #000">Image Gallery</a></li>
                <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab" style="color: #000">Customer Reviews</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="about">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well">
                                Coming Soon
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tech">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well">
                                Coming Soon
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="gallery">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well">
                                Coming Soon
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="review">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well">
                                Coming Soon
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>