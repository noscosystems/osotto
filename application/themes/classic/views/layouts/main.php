<?php
/**
* @var Controller $this
*/
$assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf8" />
        <?php
        $bootstrap = Yii::app()->assetManager->publish(Yii::getPathOfAlias('composer.twbs.bootstrap.dist'));
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $bootstrap; ?>/css/bootstrap.min.css" media="all" />
        <!-- <link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->assetManager->publish(Yii::getPathOfAlias('themes.classic.assets') . '/css/styles.css'); ?>" media="all" /> -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!--<script type="text/javascript" src="<?php echo $bootstrap; ?>/js/jquery-1.11.1.js"></script>-->
        <script src="<?php echo $bootstrap; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo $bootstrap; ?>/js/galleria/galleria-1.3.6.min.js" type="text/javascript"></script>
        <script src="<?php echo $bootstrap; ?>/js/galleria/plugins/flickr/galleria.flickr.min.js" type="text/javascript"></script>
        <link href="<?php echo $bootstrap; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />

        <link  href='http://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>

        <!-- Blueprint CSS Framework. -->
        <link href="<?php echo $assetUrl; ?>/css/screen.css" rel="stylesheet" type="text/css" media="screen, projection" />
        <link href="<?php echo $assetUrl; ?>/css/print.css" rel="stylesheet" type="text/css" media="print" />
        <!--[if lt IE 8]>
        <link href="<?php echo $assetUrl; ?>/css/ie.css" rel="stylesheet" type="text/css" media="screen, projection" />
        <![endif]-->
        <link href="<?php echo $assetUrl; ?>/css/custom.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $assetUrl; ?>/css/main.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $assetUrl; ?>/css/form.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Document Meta Title. -->
        <title>
            Osotto - Your High Tech Solutions
        </title>

        <script>
        $(document).ready( function(){
            $("#image-cycle").carousel();
        })
        </script>
    </head>

    <body>

        <div class="container-fluid">

            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="col-md-10 col-md-offset-1 col-xs-12">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img src="<?php echo $assetUrl; ?>/images/logo-inline.png"></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><?php echo CHtml::link('Home', array('/home')); ?></li>
                            <li><?php echo CHtml::link('Products', array('/product')); ?></li>
                            <li><?php echo CHtml::link('Contact', '#ContactUs'); ?></li>
                            <li><?php echo CHtml::link('About Us', '#AboutUs'); ?></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if(Yii::app()->user->isGuest): ?>
                                <li><?php echo CHtml::link('Register', array('/account/register')); ?></li>
                                <li><?php echo CHtml::link('Login', array('/login')); ?></li>
                            <?php elseif(Yii::app()->user->priv >= 10): ?>
                                <li><?php echo CHtml::link('Register a Device', array('/device/regDevice')); ?></li>
                                <li><?php echo CHtml::link('Logout', array('/account/logout')); ?></li>
                            <?php endif; ?>
                            <?php if(Yii::app()->user->priv >= 50): ?>
                                <li><?php echo CHtml::link('Admin', array('/admin/default/index')); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <div style="height:20px;"></div>

            <br />

            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12" style="padding: 0px;">
                    <?php if($this->id == 'home' && $this->action->id == 'index'): ?>

                    <?php else: ?>
                        <div class="container">
                    <?php endif; ?>
                    <?php if(Yii::app()->user->hasFlash('success')): ?>
                        <br />
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="alert alert-success">
                                    <?php echo Yii::app()->user->getFlash('success'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php echo $content; ?>

                    <div class="clear"></div>
                </div>

                <div class="col-xs-12">
                    <div class="col-xs-12 text-center" style="width:100%; background:#444; color:#CCC; padding: 30px;">
                        <?php
                        echo Yii::t(
                        'application',
                        'Copyright &copy; {year} by {company}.',
                        array(
                            '{year}' => date('Y'),
                            '{company}' => "Nosco Systems",
                            )
                        );
                        ?>
                        <?php
                        echo Yii::t('application', 'All rights reserved.');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
