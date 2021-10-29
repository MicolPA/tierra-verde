<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/site.css',
        'css/style.css',
        'css/all.min.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/all.min.js',
        'https://code.jquery.com/jquery-2.2.4.min.js',
        'js/jquery.rating.pack.js',
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
    ];
}
