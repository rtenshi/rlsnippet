<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'codemirror/lib/codemirror.css',
        'codemirror/theme/lesser-dark.css'
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $js = [
      //'js/requirejs.js',
      'codemirror/lib/codemirror.js',
      'codemirror/addon/selection/active-line.js',
      'codemirror/addon/edit/matchbrackets.js',
      'codemirror/mode/javascript/javascript.js',
      'codemirror/mode/css/css.js',
      'codemirror/mode/xml/xml.js',
      'codemirror/mode/htmlmixed/htmlmixed.js',
      'codemirror/mode/clike/clike.js',
      'codemirror/mode/sql/sql.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
