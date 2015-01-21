<?php
/**
* @var Controller $this
*/
$assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets');
$bootstrap = Yii::app()->assetManager->publish(Yii::getPathOfAlias('composer.twbs.bootstrap.dist'));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf8" />
        <!-- Scale the UI dependant on device via TWBS -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Meta tags -->
        <meta name="description" content="Tablets, HiFi Speakers and Soundbars, available from Osotto. A UK Based company focused on providing customers with high quality products for an amazing price.">
        <meta name="keywords" content="tablet,hifi,speaker,soundbar,selling,buying,android,linux,bluetooth,7.1,surround,sound">
        <meta name="robot" content="index,follow">
        <meta name="copyright" content="Copyright &copy; 2014 Nosco Solutions Ltd. All Rights Reserved.">
        <meta name="author" content="Nosco Management Solutions Ltd.">
        <meta name="language" content="English">
        <meta name="revisit-after" content="7">
        
        <!-- Load All TWBS Components -->
        <link rel="stylesheet" type="text/css" href="<?php echo $bootstrap; ?>/css/bootstrap.min.css" media="all" />

        <!-- Load TWBS Material Design Components -->
        <link href="<?php echo $assetUrl; ?>/twbs-material/dist/css/material-wfont.min.css" rel="stylesheet" type="text/css"  media="all" />
        <link href="<?php echo $assetUrl; ?>/twbs-material/dist/css/ripples.min.css" rel="stylesheet" type="text/css"  media="all" />

        <!-- Load Google Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

        <!-- Blueprint CSS Framework. -->
        <link href="<?php echo $assetUrl; ?>/css/screen.css" rel="stylesheet" type="text/css" media="screen, projection" />
        <link href="<?php echo $assetUrl; ?>/css/print.css" rel="stylesheet" type="text/css" media="print" />
        <!--[if lt IE 8]>
        <link href="<?php echo $assetUrl; ?>/css/ie.css" rel="stylesheet" type="text/css" media="screen, projection" />
        <![endif]-->

        <!-- Custom Utils -->
        <link href="<?php echo $assetUrl; ?>/css/custom.css" rel="stylesheet" type="text/css" media="all" />

        <!-- Document Meta Title. -->
        <title>
            Osotto - Your High Tech Solutions
        </title>
    </head>

    <body>
        <div class="container-fluid wrapper">
            <nav class="navbar navbar-material-red navbar-fixed-top" role="navigation">
                <div class="col-md-10 col-md-offset-1 col-xs-12">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php 
                        $imageLogo = CHtml::image($assetUrl . '/images/logo-white-2.png', 'Logo');
                        echo CHtml::link($imageLogo, array('/home'), array('class' => 'navbar-brand', 'style' => 'padding-top:15px;'))  ;
                        ?>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <?php echo CHtml::link('HiFi Systems', 'javascript:void(0)', array('class' => 'dropdown-toggle dropdown-hover', 'data-toggle' => 'dropdown')); ?>
                                <ul class="dropdown-menu" role="menu">
                                    <li><?php echo CHtml::link('PM10', array('/hifi/pm10')); ?></li>
                                    <li><?php echo CHtml::link('MH51', array('/hifi/mh51')); ?></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <?php echo CHtml::link('Tablets', 'javascript:void(0)', array('class' => 'dropdown-toggle dropdown-hover', 'data-toggle' => 'dropdown')); ?>
                                <ul class="dropdown-menu" role="menu">
                                    <li><?php echo CHtml::link('T42', array('/tablet/t42')); ?></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if(Yii::app()->user->isGuest): ?>
                                <li><?php echo CHtml::link('Register Device', array('/account/register')); ?></li>
                                <li><?php echo CHtml::link('Login', array('/login')); ?></li>
                            <?php elseif(Yii::app()->user->model()->priv >= 10): ?>
                                <li><?php echo CHtml::link('Register Device', array('/device/regdevice')); ?></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo CHtml::encode(Yii::app()->user->model()->email); ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php if(Yii::app()->user->model()->priv >= 50): ?>
                                            <li><?php echo CHtml::link('Admin', array('/admin/default/index')); ?></li>
                                        <?php endif; ?>
                                        <li><?php echo CHtml::link('Change password', array('/account/changepass')); ?></li>
                                        <li class="divider"></li>
                                        <li><?php echo CHtml::link('Logout', array('/account/logout')); ?></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <div style="height:32px; width:100%"></div>

            <br />

            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12" style="padding: 0px;">
                    <div class="container-fluid" style="margin:0px; padding:0px; width:100%;">
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
                </div>
            </div>
            <div style="height:80px; width:100%"></div>
        </div>
        <div class="col-xs-12 text-center font-opensans" style="width:100%; height:80px; background:#333; color:#CCC; padding:30px; position:relative;">
            <span class="font-opensans">
                Copyright &copy; <?php echo date("Y"); ?> <?php echo CHtml::link('Nosco Systems', 'http://www.noscosystems.com'); ?>. All rights reserved.
            </span>
        </div>

        <script src="<?php echo $assetUrl; ?>/js/jq.1.11.1.min.js"></script>
        <script src="<?php echo $bootstrap; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo $assetUrl; ?>/twbs-material/dist/js/material.min.js"></script>
        <script src="<?php echo $assetUrl; ?>/twbs-material/dist/js/ripples.min.js"></script>
        <script src="<?php echo $assetUrl; ?>/js/main.js"></script>

        <script>
            // Google Analytics
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  
            ga('create', 'UA-50290689-2', 'auto');
            ga('require', 'displayfeatures');
            ga('send', 'pageview');
        </script>
    </body>
</html>
