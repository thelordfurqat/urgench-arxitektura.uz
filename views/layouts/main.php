<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--	<meta name="google-site-verification" content="yM-oVjGPK3ps7bJp8oWJ24J3pfvsPfcNqGSwQHBkjLA">-->
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <link rel="icon" type="image/png" href="/favicon.png" />




<?php $this->head() ?>


</head>

<body >
<?php $this->beginBody() ?>


<div id="wrapper" class="wrapper">
    <!-- Header Area Start Here -->
    <?=$this->render('_header')?>
    <!-- Header Area End Here -->
    <!-- Top Bar Space Start-->
    <div id="header-area-space"></div>
    <!-- Top Bar Space End-->
<?=$content?>
    <?=$this->render('_footer')?>
</div>

<?php


?>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
