<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

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
        'css/site.css',
        'css/user.css',
        //--------------
        '../themes/margo/assets/css/font-awesome.min.css',
        '../themes/margo/assets/css/responsive.css',
        '../themes/margo/assets/css/animate.css',
        '../themes/margo/assets/css/colors/red.css',
        '../themes/margo/assets/css/colors/jade.css',
        '../themes/margo/assets/css/colors/green.css',
        '../themes/margo/assets/css/colors/blue.css',
        '../themes/margo/assets/css/colors/beige.css',
        '../themes/margo/assets/css/colors/cyan.css',
        '../themes/margo/assets/css/colors/orange.css',
        '../themes/margo/assets/css/colors/peach.css',
        '../themes/margo/assets/css/colors/pink.css',
        '../themes/margo/assets/css/colors/purple.css',
        '../themes/margo/assets/css/colors/sky-blue.css',
        '../themes/margo/assets/css/colors/yellow.css',   
        '../themes/margo/assets/css/style.css',  
        '../themes/margo/assets/css/custom.css',          
    ];
    public $js = [
        '../themes/margo/assets/js/jquery.migrate.js',
        '../themes/margo/assets/js/modernizrr.js',
        '../themes/margo/assets/js/jquery.fitvids.js',        
        '../themes/margo/assets/js/owl.carousel.min.js',  
        '../themes/margo/assets/js/nivo-lightbox.min.js',  
        '../themes/margo/assets/js/jquery.isotope.min.js',  
        '../themes/margo/assets/js/jquery.appear.js',  
        '../themes/margo/assets/js/count-to.js',          
        '../themes/margo/assets/js/jquery.textillate.js',          
        '../themes/margo/assets/js/jquery.lettering.js',          
        '../themes/margo/assets/js/jquery.easypiechart.min.js',          
        '../themes/margo/assets/js/jquery.nicescroll.min.js',          
        '../themes/margo/assets/js/jquery.parallax.js',          
        '../themes/margo/assets/js/mediaelement-and-player.js',          
        '../themes/margo/assets/js/script.js', 
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
    ];
}
