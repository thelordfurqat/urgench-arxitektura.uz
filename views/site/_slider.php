<div id="pg-32-0"  class="panel-grid panel-has-style" >
    <div class="siteorigin-panels-stretch panel-row-style panel-row-style-for-32-0" data-stretch-type="full-stretched" ><div id="pgc-32-0-0"  class="panel-grid-cell" ><div id="panel-32-0-0-0" class="so-panel widget widget_vmagazine_lite_category_posts_slider vmagazine_lite_category_posts_slider panel-first-child panel-last-child" data-index="0">        <div class="vmagazine-lite-cat-slider block-post-wrapper block_layout_1" style="background-image: url()">
                    <style>
                        #pg-32-0 .siteorigin-panels-stretch.panel-row-style.panel-row-style-for-32-0
                        .content-wrapper-featured-slider .widget-cat-slider .single-post.clearfix{
                            height: 500px;
                            overflow: hidden;
                        }
                        .vmagazine-lite-cat-slider.block-post-wrapper.block_layout_1 .content-wrapper-featured-slider .lSSlideWrapper li.single-post .class-for-slider-32 {
                            position: absolute;
                            bottom: 0;
                            right: 0;
                            left: auto;
                            background: transparent;
                            -webkit-transform: none;
                            -moz-transform: none;
                            -ms-transform: none;
                            -o-transform: none;
                            transform: none;
                            text-align: left;
                            min-width: 28rem;
                            margin: 0;
                            color: rgba(24,24,24,0.95);
                            padding: 5rem 2.5rem;
                        }
                        .vmagazine-lite-cat-slider.block-post-wrapper.block_layout_1 .content-wrapper-featured-slider .lSSlideWrapper li.single-post .class-for-slider-32 h3 a{
                            background: rgba(255,255,255,0.2);
                        }
                    </style>

                    <div class="content-wrapper-featured-slider">
                        <h4 class="block-title">
                            <span class="title-bg">Фото албомлар</span>
                        </h4>

                        <ul class="widget-cat-slider cS-hidden">

                            <?php foreach ($slide as $item):?>
                                <li class="single-post clearfix">
                                <div class="post-thumb">
                                    <img src="/uploads/<?= $item->image?>" alt="" title=""/>
                                </div>
                                <div class="class-for-slider-32">

                                    <h3 class="extra-large-font">
                                        <a href="<?= Yii::$app->urlManager->createUrl(['site/view','code'=>$item->code])?>"><?= $item->name?></a>
                                    </h3>

                                </div><!-- .post-caption -->
                            </li><!-- .single-post -->

                            <?php endforeach;?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
