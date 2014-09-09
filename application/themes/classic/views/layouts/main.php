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
        <!--<script src="https://code.jquery.com/jquery.js"></script>-->
        <script type="text/javascript" src="<?php echo $bootstrap; ?>/js/jquery-1.11.1.js"></script>
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

        <style>
        body {
            background: #FFF;
        }

        a:visited {
            text-decoration: none;
        }
        a:link {
            text-decoration: none;
        }
        a:active {
            text-decoration: none;
        }
        a:hover {
            text-decoration: none;
        }

        .font-raleway {
            font-family: 'Raleway', sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        .links{
            color: #363635;
            float: right;
            font-family: 'Raleway',sans-serif;
            margin-right: 20px;
            margin-top: 13px;
            text-transform: uppercase;
        }
        .btns{
            margin-left:15px;
        }
        </style>
    </head>

    <body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="pull-left">
        <!-- <div class="logo"> -->
            <img src="<?php echo $assetUrl; ?>/images/logo-inline.png">
        <!-- </div> -->
    </div>
    <div class="pull-right links">
        <?php
            echo CHtml::link('Home', array('/home/'), array('class'=>'btn btn-xs btn-danger btns'));
            echo CHtml::link('Products', array('/product/'), array('class'=>'btn btn-xs btn-danger btns'));
            echo CHtml::link('Contact', array('#ContactUs'), array('class'=>'btn btn-xs btn-danger btns'));
            echo CHtml::link('ABOUT US', array('#AboutUs'), array('class'=>'btn btn-xs btn-danger btns'));
            echo CHtml::link('Register product', array('/device/regDevice'), array('class'=>'btn btn-xs btn-danger btns'));
            if (Yii::app()->user->isGuest){
                echo CHtml::link('Home', array('/'), array('class'=>'btn btn-xs btn-success btns'));
                echo CHtml::link('Login', array('/login'), array('class'=>'btn btn-xs btn-success btns'));
                // echo CHtml::link('Register', array('/account/register'), array('class'=>'btn btn-xs btn-danger btns'));
                echo CHtml::link('Register', array('/account/register'), array('class'=>'btn btn-xs btn-danger btns'));
            }
            else if (!Yii::app()->user->priv>=10)
                echo CHtml::link('Logout', array('/account/logout'), array('class'=>'btn btn-xs btn-danger btns'));
            else if (Yii::app()->user->priv>=50){
                echo CHtml::link('Logout', array('/account/logout'), array('class'=>'btn btn-xs btn-danger btns'));   
                echo CHtml::link('Admin', array('/admin/default/index'), array('class'=>'btn btn-xs btn-danger btns'));
            }
        ?>

    </div>
  </div>
</nav>
<br><br><br>
	<?php if($this->id == 'home' && $this->action->id == 'index'): ?>
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: #000;">
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

            <hr>
                <div class="col-xs-12 text-center">
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
                    <br />
                    <?php
                        $languages = array(
                            'en' => 'English',
                            'cy' => 'Cymraeg',
                        );
                        foreach($languages as $code => &$lang) {
                            $lang = CHtml::link($lang, array('/language', 'lang' => $code));
                        }
                        echo implode(' &middot; ', $languages);
                    ?>
                </div>
        </div>
    </body>

</html>
