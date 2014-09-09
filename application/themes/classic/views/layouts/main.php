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
        <link href="<?php echo $assetUrl; ?>/css/main.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo $assetUrl; ?>/css/form.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Document Meta Title. -->
        <title>
            Osotto - Your High Tech Solutions
        </title>

        <script>
        $(document).ready function(){
            $("#image-cycle").carousel();
        }
        </script>
    </head>

    <body>

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
                        <li class="active"><?php echo CHtml::link('Home', array('/home')); ?></li>
                        <li><?php echo CHtml::link('Products', array('/product')); ?></li>
                        <li><?php echo CHtml::link('Contact', '#ContactUs'); ?></li>
                        <li><?php echo CHtml::link('About Us', '#AboutUs'); ?></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <br />

        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-xs-12" style="padding: 0px;">
               <?php /* <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="container">
                        <div class="pull-left">
                            <!-- <div class="logo"> -->
                            
                            <!-- </div> -->
                        </div>
                        <div class="pull-right links">
                            <?php
                            echo CHtml::link('Home', array('/home/'), array('class'=>'btn btn-xs btn-danger btns'));
                            echo CHtml::link('Products', array('/product/'), array('class'=>'btn btn-xs btn-danger btns'));
                            echo CHtml::link('Contact', array('#ContactUs'), array('class'=>'btn btn-xs btn-danger btns'));
                            echo CHtml::link('ABOUT US', array('#AboutUs'), array('class'=>'btn btn-xs btn-danger btns'));
                            if (Yii::app()->user->isGuest){
                                echo CHtml::link('Home', array('/'), array('class'=>'btn btn-xs btn-success btns'));
                                echo CHtml::link('Login', array('/login'), array('class'=>'btn btn-xs btn-success btns'));
                                // echo CHtml::link('Register', array('/account/register'), array('class'=>'btn btn-xs btn-danger btns'));
                                echo CHtml::link('Register', array('/account/register'), array('class'=>'btn btn-xs btn-danger btns'));
                            }
                            else if (!Yii::app()->user->priv>=10){
                                echo CHtml::link('Register a device', array('/device/regDevice'), array('class'=>'btn btn-xs btn-danger btns'));
                                echo CHtml::link('Logout', array('/account/logout'), array('class'=>'btn btn-xs btn-danger btns'));   
                            }
                            else if (Yii::app()->user->priv>=50){
                                echo CHtml::link('Register a device', array('/device/regDevice'), array('class'=>'btn btn-xs btn-danger btns'));
                                echo CHtml::link('Logout', array('/account/logout'), array('class'=>'btn btn-xs btn-danger btns'));   
                                echo CHtml::link('Admin', array('/admin/default/index'), array('class'=>'btn btn-xs btn-danger btns'));
                            }
                            ?>

                        </div>
                    </div>
                </nav>
                */ ?>
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
    </body>
</html>
