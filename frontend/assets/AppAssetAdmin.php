<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle .
 */
class AppAssetAdmin extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/admin/site.css',
        // 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/admin/bootstrap.min.css',
        'css/admin/all.min.css',
        'css/admin/materialdesignicons.min.css',
        'css/admin/vendor.bundle.base.css?v=2',
        'css/admin/dataTables.bootstrap4.css?v=2',
        'css/admin/style.css?v=4',
        'css/admin/style-mine.css?v=6',
        'css/custom-style.css?v=1',
        'css/all.min.css',
    ];
    public $js = [
        'https://code.jquery.com/jquery-3.2.1.slim.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        // 'js/admin/bootstrap.min.js',
        'js/admin/vendor.bundle.base.js',
        'js/admin/Chart.min.js',
        'js/admin/jquery.dataTables.js',
        'js/admin/dataTables.bootstrap4.js',
        'js/admin/off-canvas.js',
        'js/admin/hoverable-collapse.js',

        'js/admin/dashboard.js',
        'js/admin/sweetalert.min.js',
        'js/admin/data-table.js',

        'js/admin/all.min.js',
        // 'js/admin/file-upload.js',
        'js/admin/main.js',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js',
        // 'js/admin/template.js',
        'js/multi-input.js',
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
