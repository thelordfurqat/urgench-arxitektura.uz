
<aside id="secondary" class="widget-area vmagazine-lite-sidebar" role="complementary">
    <div class="theiaStickySidebar">
        <div id="search-3" class="widget widget_search">
            <form method="get" class="search-form" action="<?= Yii::$app->urlManager->createUrl(['site/search'])?>">
                <label>
                    <span class="screen-reader-text">Qidirish:</span>
                    <input type="search" autocomplete="off" class="search-field" placeholder="Калит сўз киритинг ..." value="" name="s">
                </label>
                <input type="submit" class="search-submit" value="Search">

            </form>

        </div>

        <?= $this->render('_vote')?>

<div id="categories-3" class="widget widget_categories">
            <h4 class="widget-title"><span class="title-bg">Валюталар курслари</span></h4>
            <ul>
                 <li class="cat-item">
					<a title="Ўзбекистон Республикаси Марказий банки" href="http://cbu.uz/uz/arkhiv-kursov-valyut/" target="_blank" rel="noopener"><img style="display: block; margin-left: auto; margin-right: auto;" src="http://cbu.uz/uz/informer/?txtclr=ffffff&amp;brdclr=3399cc&amp;bgclr=3399cc&amp;r_choose=USD_EUR_RUB" alt=""></a>
				</li>

            </ul>
        </div>
        <div id="categories-3" class="widget widget_categories">
            <h4 class="widget-title"><span class="title-bg">Оммабоб мақолалар</span></h4>
            <ul>
                <?php $model = \app\models\News::find()->where(['>','id',3])->orderBy(['show_counter'=>SORT_DESC])->limit(10)->all();
                foreach ($model as $item) {?>
                    <li class="cat-item"><a href="<?= Yii::$app->urlManager->createUrl(['site/view','code'=>$item->code])?>"><?= $item->name?>						</a></li>

                <?php }
                ?>
            </ul>
        </div>
		
		
    </div>
</aside><!-- #secondary -->