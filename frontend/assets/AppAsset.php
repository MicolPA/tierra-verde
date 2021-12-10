<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle .
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        // 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        'css/all.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css',
        'css/materialdesignicons.min.css',
        'css/vendor.bundle.base.css?v=2',
        'css/dataTables.bootstrap4.css?v=2',
        'css/site.css?v=1',
        'css/style.css?v=4',
        'css/style-mine.css?v=6',
    ];
    public $js = [
        // 'https://code.jquery.com/jquery-3.2.1.slim.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        // 'js/bootstrap.min.js',
        // 'js/vendor.bundle.base.js',
        'js/Chart.min.js',
        'js/jquery.dataTables.js',
        'js/dataTables.bootstrap4.js',
        'js/off-canvas.js',
        'js/hoverable-collapse.js',

        'js/dashboard.js',
        'js/sweetalert.min.js',
        'js/data-table.js',

        'js/all.min.js',
        // 'js/file-upload.js',
        'js/main.js',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js'
        // 'js/template.js',
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
