<?php
    /**
     * @var ErrorController $this
     * @var array $error
     */
    $this->pageTitle = Yii::t('application', 'Error');
    $this->breadcrumbs = null;
?>
<h1><?php echo $this->pageTitle . ' ' . $code; ?></h1>

<?php if($code == 404): ?>
    <!--
        <?php echo CHtml::image('http://th08.deviantart.net/fs10/PRE/i/2006/105/0/6/Easter_Egg_by_D_Money_16.jpg', 'This is not an easter egg', array('height' => 50, 'width' => 50)); ?>
    -->
<?php endif; ?>

<div class="error">
    <p><?php echo $message; ?></p>
</div>
