


    <nav class="navbar" id="navigation-bar">

        <div class="navbar-header">
                <a class="navbar-brand" href="<?= Yii::$app->urlManager->createUrl(['site/index'])?>"><span class="fa fa-home"></span></a>
        </div>

            <?= \app\components\MenuBuilder::generate('menu')?>

    </nav>

