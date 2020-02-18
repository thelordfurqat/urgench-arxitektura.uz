<?php
?>

<header>
    <div id="header-one" class="bg-light light-border header header-layout1 header-fixed">
        <div class="header-top-area1 header-top-bar bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-3 col-sm-12">
                        <div class="logo-area" style="margin-top: 0"><a href="<?=Yii::$app->homeUrl?>"><img src="<?=Yii::$app->homeUrl?>theme/img/logo1.png" alt="logo" class="img-responsive"></a></div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="media top-bar-contact-layout4">
                            <div class="media-left media-middle">
                                <i class="icofont icofont-location-arrow"></i>
                            </div>
                            <div class="media-body">
                                <p>Xorazm viloyati Gurlan tumani</p>
                                <h2 class="media-heading"> Mustaqillik-shox ko'chasi 5-uy</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="media top-bar-contact-layout4">
                            <div class="media-left media-middle">
                                <i class="icofont icofont-clock-time"></i>
                            </div>
                            <div class="media-body">
                                <p>Ish vaqtlari:</p>
                                <h2 class="media-heading">Dush - Jum: 9.00 - 18.00</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-12">
                        <div class="media top-bar-contact-layout4">
                            <div class="media-left media-middle">
                                <i class="icofont icofont-phone"></i>
                            </div>
                            <div class="media-body">
                                <p>Telefon:</p>
                                <h2 class="media-heading">(0362) 365-13-51</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-area" id="sticker">
            <div class="container">
                <div class="row d-md-flex">
                    <div class="col-lg-8 col-md-9">
                        <nav id="dropdown">
                            <?=\app\components\MenuBuilder::generate('menu')?>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-1">
                        <div class="header-search layout2">
                            <form>
                                <input type="text" class="search-input search-form" placeholder="Search...." required="">
                                <a href="#" id="search-button"  class="search-button"><i class="icofont icofont-search"></i></a>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-1">
                        <a href="<?=Yii::$app->urlManager->createUrl(['/site/contac'])?>" title="quote" class="btn quote-btn-grey">Bog'lanish</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
