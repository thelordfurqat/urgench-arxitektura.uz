<div class="vmagazine-lite-ticker-wrapper">
    <div class="vmagazine-lite-container default-layout">
        <div class="ticker-wrapp">
            <div class="vmagazine-lite-ticker-caption">
                <span>Янгиликлар</span>
            </div>

            <ul id="vmagazine-lite-news-ticker">
                <?php $model = \app\models\News::find()->orderBy(['created'=>SORT_DESC])->limit(10)->where(['status'=>1])->all();
                    foreach ($model as $item):
                ?>
                <li>
                    <div class="single-news">
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/view','code'=>$item->code])?>"><?= mb_substr($item->name,0,60,'utf-8') ?></a>
                        <span class="date">
                        <a href="<?= Yii::$app->urlManager->createUrl(['site/news','code'=>$item->cat->code])?>"><?= mb_substr($item->cat->name,0,40,'utf-8').' ' ?></a>
                            </span>
                        <span class="date">
                                <?= $this->render('/site/_date',['date'=>$item->created])?>
                        </span>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div><!--.vmagazine-lite-container -->
</div>



<?php
$this->registerJs("
$('#vmagazine-lite-news-ticker').lightSlider({
    loop:true,
    vertical: true,
    pager:false,
    auto:true,
    speed: 600,
    pause: 3000,
    enableDrag:false,
    verticalHeight:80,
    
  });
");
?>