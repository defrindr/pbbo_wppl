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
class MazerAsset extends AssetBundle
{
    public $basePath = '@webroot/mazer/assets';
    public $baseUrl = '@web/mazer/assets';
    public $css = [
        'css/main/app-dark.css',
        'css/main/app.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css',
        'css/shared/iconly.css',
        'css/custom.css'
    ];
    public $js = [
        'js/app.js',
    ];

    public $depends = [];
}
