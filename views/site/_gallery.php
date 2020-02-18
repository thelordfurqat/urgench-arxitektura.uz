<div id="pg-32-2"  class="panel-grid panel-no-style" style="display:  <?php if(isset($type) and $type){?>block<?php }else{?>none<?php }?>" >
    <div id="pgc-32-2-0"  class="panel-grid-cell" >
        <div id="panel-32-2-0-0" class="so-panel widget widget_vmagazine_lite_category_slider_tab_carousel vmagazine_lite_category_slider_tab_carousel panel-first-child panel-last-child" data-index="1">

           <?php if(isset($type) and $type):?>

            <div class="vmagazine-lite-slider-tab-carousel">

                <div class="block-post-wrapper">
                    <div class="block-header clearfix">
                        <h4 class="block-title"><span class="title-bg">Сўнги Янгиликлар</span></h4>
                    </div><!-- .block-header-->
                    <div class="block-content-wrapper-carousel">
                        <div class="block-cat-content-carousel">

                            <div class="tab-cat-slider-carousel">

                                <?php foreach ($article as $item) :

                                ?>
                                <div class="single-post">
                                    <div class="post-thumb">
                                        <img src="/uploads/<?=$item->image?>" alt="" style="max-height:182px;" title="<?= $item->name?>" />
                                        <div class="image-overlay"></div>
                                    </div>
                                    <div class="post-caption">
                                        <div class="post-meta clearfix">
                                            <span class="posted-on"><i class="fa fa-clock-o"></i><?= $this->render('_date',['date'=>$item->created])?></span>
                                        </div>

                                        <h3 class="large-font">
                                            <a href="<?= Yii::$app->urlManager->createUrl(['site/view','code'=>$item->code])?>">
                                                <?= $item->name?>
                                            </a>
                                        </h3>
                                    </div><!-- .post-caption -->
                                </div><!-- .single-post -->

                                <?php endforeach;?>

                            </div>
                        </div>
                    </div><!-- block-content-wraper-->
                </div><!-- .block-post-wrapper -->
            </div>

            <?php endif?>

        </div>
    </div>
</div>



<?php

$this->registerJs("
        $('.tab-cat-slider-carousel').slick({
  
        dots: true,
        speed: 600,
        arrows:true,
        focusOnSelect: true,
        centerMode: true,
        centerPadding: 0,
        slidesToShow: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 500,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
           ]
        });
")
?>