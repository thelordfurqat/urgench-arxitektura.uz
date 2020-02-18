<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>

<?php
$class = "vmagazine-lite-home-wrapp";
switch (Yii::$app->controller->action->id){
    case 'news': $class = "vmagazine-lite-container"; break;
    case 'search': $class = "vmagazine-lite-container"; break;
    case 'error': $class = "vmagazine-lite-container"; break;
}
$this->title = $name .' | khorezmeconomy.uz'
?>



<div class="<?= $class?>" style="margin-top:30px;">



    <?= $this->render('/site/_gallery')?>


    <div id="primary" class="content-area vmagazine-lite-content">
        <main id="main" class="site-main" role="main">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>
        </main>
    </div>

            <?= $this->render('_secondary')?>



    </div><!-- .vmagazine-lite-home-wrapp -->
