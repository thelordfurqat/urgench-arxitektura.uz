<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/theme/css/normalize.css',
        '/theme/css/main.css',
        '/theme/css/bootstrap.min.css',
        '/theme/css/animate.min.css',
        '/theme/css/icofont.css',
        '/theme/css/font-awesome.min.css',
        '/theme/css/bicon.min.css',
        '/theme/css/font/flaticon.css',
        '/theme/vendor/OwlCarousel/owl.carousel.min.css',
        '/theme/vendor/OwlCarousel/owl.theme.default.min.css',
        '/theme/css/meanmenu.min.css',
        '/theme/vendor/slider/css/nivo-slider.css',
        '/theme/vendor/slider/css/preview.css',
        '/theme/css/magnific-popup.css',
        '/theme/style.css',
        '/theme/css/mystyle.css',

    ];
    public $js = [
        '/theme/js/modernizr-2.8.3.min.js',
        '/theme/js/jquery-2.2.4.min.js',
        '/theme/js/plugins.js',
        '/theme/js/bootstrap.min.js',
        '/theme/js/wow.min.js',
        '/theme/vendor/slider/js/jquery.nivo.slider.js',
        '/theme/vendor/slider/home.js',
        '/theme/vendor/OwlCarousel/owl.carousel.min.js',
        '/theme/js/jquery.meanmenu.min.js',
        '/theme/js/jquery.scrollUp.min.js',
        '/theme/js/jquery.counterup.min.js',
        '/theme/js/waypoints.min.js',
        '/theme/js/jquery.countdown.min.js',
        '/theme/js/isotope.pkgd.min.js',
        '/theme/js/jquery.magnific-popup.min.js',
        '/theme/js/main.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
