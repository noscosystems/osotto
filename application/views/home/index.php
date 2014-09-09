<?php
/* @var $this HomeController */

$this->breadcrumbs=array(
	'Home',
);
?>
<?php $assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets'); ?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" align="center">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <!-- <li data-target="#carousel-example-generic" data-slide-to="4"></li> -->
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo $assetUrl; ?>/images/android1.png" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $assetUrl; ?>/images/carousel2.png" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $assetUrl; ?>/images/hifi1.png" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $assetUrl; ?>/images/soundbar1.png" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>
  

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<div class="col-sm-12 text-center">
  <h3 style="font-size: 4em;" class="font-ubuntu text-dark text-shadow-light">Welcome to Osotto - your high tech solutions</h3>
</div>
<div class="col-sm-12">
  <div class="col-sm-6 col-xs-12 text-center" >
    Tablets
  <div class="col-sm-12 col-xs-12" style="z-index:999;">
    <!-- <img src="<?php // echo Yii::app()->assetManager->publish('C:\\xampp\\htdocs\\osotto\\application\\views\\Uploads\\03bb346.png');?>" class="img-rounder img-rounded"> -->
  </div>
  </div>
  <div class="col-sm-6 col-xs-12 text-center">Hifi</div>
    <ul style="list-style-type:none;">

      <li>Front 3” x2 + 1” tweeter x 2</li>

      <li>Centre 3” x 2 + 1” tweeter</li>

      <li>Surround 3” x 2</li>
    
    <li>Frequency Response: 85hz – 25khz</li>
    </ul>
    <p>Subwoofers:</p>
    <ul style="list-style-type:none;">
      <li>5.25” x 2 with side reflex ports.</li>

      <li>Frequency response: 40hz – 150hz</li>

      <li>S/N Ratio: >86db</li>
  </div>
  <div class="col-sm-6">
    <?php echo CHtml::image($assetUrl.'/images/soundbar.png', 'alt', array ('height' => '320', 'width' => '420')); ?>
  </div>
  </div>

<div>
      <div class="col-md-12">
         <div class="row text-center" id="AboutUs" style="background:lightgrey">
          <h1 style="font-size: 4em;" class="font-ubuntu text-dark text-center text-shadow-light">About Us</h1>
          <br>
          Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. Този начин не само е оцелял повече от 5 века, но е навлязъл и в публикуването на електронни издания като е запазен почти без промяна. Популяризиран е през 60те години на 20ти век със издаването на Letraset листи, съдържащи Lorem Ipsum пасажи, популярен е и в наши дни във софтуер за печатни издания като Aldus PageMaker, който включва различни версии на Lorem Ipsum.

    Известен факт е, че читателя обръща внимание на съдържанието, което чете, а не на оформлението му. Свойството на Lorem Ipsum е, че до голяма степен има нормално разпределение на буквите и се чете по-лесно, за разлика от нормален текст на английски език като "Това е съдържание, това е съдържание". Много системи за публикуване и редактори на Уеб страници използват Lorem Ipsum като примерен текстов модел "по подразбиране", поради което при търсене на фразата "lorem ipsum" в Интернет ще бъдат открити много сайтове в процес на разработка. Някой от тези сайтове биват променяни с времето, а други по случайност или нарочно(за забавление и пр.) биват оставяни в този си незавършен вид.
        <br /><br>
        </div>
        
      </div>
</div>

  <!-- <div class="col-md-12">
     <div class="row" id="ContactUs">
      <h1 style="font-size: 4em;" class="font-ubuntu text-dark text-center text-shadow-light">Contact Us</h1>
    </div>
    <div class="col-md-3 text-center">
      <h3 style="font-size: 1.5em" class="font-raleway text-dark">Telephone</h3>
      02920 400998
    </div>
    <div class="col-md-3 text-center">
      <h3 style="font-size: 1.5em" class="font-raleway text-dark">Email</h3>
      sales@osotto.co.uk
    </div>
    <div class="col-md-3">

    </div>
    <div class="col-md-3">

    </div>
</div> -->

 <div>
    <div class="content content-contact">
      <br /><br>
        <div class="container" id="ContactUs">
            <br><br>
            <h1 class="font-ubuntu text-dark text-center text-shadow-light" style="font-size: 4em;">Contact Us</h1>
            <br /><br />
            <div class="row">
                <div class="col-sm-3 col-xs-6 text-center">
                    <h3 class="font-raleway text-dark" style="font-size: 1.5em">Telephone</h3>
                    <br />
                    <a href="tel:02036577026">02920 400 998</a>
                    
                </div>
                <div class="col-sm-3 col-xs-6 text-center">
                    <h3 class="font-raleway text-dark" style="font-size: 1.5em">Email</h3>
                    <br />
                    <a href="mailto:info@smart-outsourcing-solutions.com">sales@osotto.co.uk.com</a>
                </div>

                <div class="col-sm-3 text-center">
                    <h3 class="font-raleway text-dark" style="font-size: 1.5em">Follow Us</h3>
                    <br />
                    <div class="row">
                        <div class="col-xs-4 text-right">
                            <a href="https://www.facebook.com/pages/Smart-Outsourcing-Solutions/1446520535601324">
                                <img src="assets/images/social/facebook.png" class="img-responsive" alt="Facebook" style="height:60px; width:60px;">
                            </a>
                        </div>
                        <div class="col-xs-4 text-center">
                            <a href="https://twitter.com/SmartOutsource_">
                                <img src="assets/images/social/twitter.png" class="img-responsive" alt="Twitter" style="height:60px; width:60px;">
                            </a>
                        </div>
                        <div class="col-xs-4 text-left">
                            <a href="https://www.linkedin.com/company/smart-outsourcing-solutions-ltd?trk=biz-companies-cym">
                                <img src="assets/images/social/linkedin.png" class="img-responsive" alt="Instagram" style="height:60px; width:60px;">
                            </a>
                        </div>
                    </div>
                </div>
</div>
      
        <br /><br />

    </div>
</div>



<?php
/*
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
*/
?>
