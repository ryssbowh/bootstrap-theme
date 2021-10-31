<?php
namespace Ryssbowh\BootstrapTheme\assets\bundles;

use craft\web\AssetBundle;

class FrontAssets extends AssetBundle
{
    public $sourcePath = __DIR__ . '/../dist/front';

    public $js = [
        'vendor~front.js',
        'front.js'
    ];

    public $css = [
        'vendor~front.css',
        'front.css'
    ];
}