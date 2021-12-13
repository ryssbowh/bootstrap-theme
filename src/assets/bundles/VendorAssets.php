<?php
namespace Ryssbowh\BootstrapTheme\assets\bundles;

use craft\web\AssetBundle;

class VendorAssets extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = __DIR__ . '/../dist/app';

    /**
     * @inheritDoc
     */
    public $js = [
        'vendor~app~highlight.js',
        'vendor~app.js'
    ];

    /**
     * @inheritDoc
     */
    public $css = [
        'vendor~app.css'
    ];
}