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
$this->title = $name .' | yangibozorhokimiyat.uz'
?>



<div class="<?= $class?>">



<?= $this->render('/site/_gallery')?>


<div id="primary" class="content-area vmagazine-lite-content">
    <main id="main" class="site-main" role="main">


        <?php if(count($model)==0){ echo $this->render('_searchnotfound');}?>
        <?php foreach ($model as $item): ?>
        <article  class=" post type-post status-publish format-standard has-post-thumbnail hentry category-news category-wiiu category-xboxone">

            <div class="archive-wrapper">
                <div class="entry-thumb">
                    <a class="thumb-zoom"  style="text-align: center;" href="<?= Yii::$app->urlManager->createUrl(['site/view','code'=>$item->code])?>">
                        <img src="/uploads/<?= $item->image?>" alt="" style="max-height:200px; width:auto"/>
                        <div class="image-overlay"></div>
                    </a>
                </div><!-- .entry-thumb -->
                <div class="list-left-wrap">
                    <div class="entry-header">
                        <div class="entry-meta">
                            <span class="posted-on"><i class="fa fa-clock-o"></i><?= $this->render('_date',['date'=>$item->created])?></span>
                        </div><!-- .entry-meta -->
                    </div><!-- .entry-header.layout1-header -->
                    <div class="post-title-wrap">
                        <h2 class="entry-title">
                            <a href="<?= Yii::$app->urlManager->createUrl(['site/view','code'=>$item->code])?>">
                                <?= $item->name?>
                            </a>
                        </h2>
                    </div>
                    <div class="entry-content">
						<p><?=$item->preview?></p>
                        <a class="vmagazine-lite-archive-more" style="text-decoration: none;" href="<?= Yii::$app->urlManager->createUrl(['site/view','code'=>$item->code])?>">
                            Батафсил
                        </a>
                    </div><!-- .entry-content -->
                </div><!-- .list-left-wrap -->
            </div><!-- .archive-btm-wrapper -->

        </article><!-- #post-## -->
        <?php endforeach;?>


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
