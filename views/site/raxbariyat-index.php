<?php if(Yii::$app->controller->action->id=='search'){
    echo \app\components\BreadcrumbsGenerator::generate(['code'=>$code, 'type'=>'search']);
}else{
    echo \app\components\BreadcrumbsGenerator::generate(['code'=>$code, 'type'=>'news']);
}?>

<?php
$class = "vmagazine-lite-home-wrapp";
switch (Yii::$app->controller->action->id){
    case 'news': $class = "vmagazine-lite-container"; break;
    case 'search': $class = "vmagazine-lite-container"; break;
}
$this->title = $name .' | khorezmeconomy.uz'
?>



<div class="<?= $class?>">



    <?= $this->render('/site/_gallery')?>


    <div id="primary" class="content-area vmagazine-lite-content">
        <main id="main" class="site-main" role="main">


            <?php if(count($model)==0){ echo $this->render('_searchnotfound');}?>
            <table style="border-collapse: collapse; border-color: #dddddd;">
                <tbody>
            <?php foreach ($model as $item): ?>

                    <tr>
                        <td style="width: 245.219px; height: auto;"><img src="/uploads/<?= $item->image?>" alt=""></td>
                        <td style="width: 1295.22px; height: auto;" rowspan="2">
                            <p style="margin-top: 15px"><strong><?=$item->name?></strong></p>
                            <p><?=$item->preview?></p>

                            <p>
                                <a href="<?= Yii::$app->urlManager->createUrl(['site/view','code'=>$item->code])?>">
                                    Батафсил
                                </a>
                            </p>
                        </td>
                    </tr>
                    <tr style="height: 91px;">
                        <td style="width: 245.219px; height: 91px;">
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                    </tr>

            <?php endforeach;?>
                </tbody>
            </table>

        </main><!-- #main -->
        <div class="archive-bottom-wrapper">
            <nav class="navigation pagination" role="navigation">
                <h2 class="screen-reader-text">Posts navigation</h2>
                <div class="nav-links">
                    <?php
                    echo \yii\widgets\LinkPager::widget(['pagination' => $pages]);
                    ?>
                </div>
            </nav>

        </div>

    </div><!-- #primary -->



    <?= $this->render('_secondary')?>



</div><!-- .vmagazine-lite-home-wrapp -->
