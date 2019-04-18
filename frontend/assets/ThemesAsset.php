<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ThemesAsset extends AssetBundle
{
    // public $basePath = '@webroot';
    // public $baseUrl = '@web';
    public $sourcePath='@frontend/themes';

    public $css = [
        'css/site.css',
        'css/navbar.css',
        'readable/bootstrap.min.css',
        'https://fonts.googleapis.com/css?family=Kanit|Prompt',

        // //datatables css
        // 'datatables/css/dataTables.bootstrap.min.css',
        // 'datatables/css/buttons.dataTables.min.css'
    ];
    public $js = [
        // //datatables js
        // 'datatables/js/jquery.dataTables.min.js',
        // 'datatables/js/dataTables.bootstrap.min.js',
        // 'datatables/js/dataTables.buttons.min.js',
        // 'datatables/js/jszip.min.js',
        // 'datatables/js/pdfmake.min.js',
        // 'datatables/js/vfs_fonts.js',
        // 'datatables/js/buttons.html5.min.js',
        // 'datatables/js/buttons.colVis.min.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'rmrevin\yii\fontawesome\AssetBundle'
    ];
}
