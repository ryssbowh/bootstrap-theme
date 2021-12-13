<?php
namespace Ryssbowh\BootstrapTheme\assets\bundles;

use craft\web\AssetBundle;

class FrontAssets extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = __DIR__ . '/../dist/app';

    /**
     * @inheritDoc
     */
    public $js = [
        'app.js'
    ];

    /**
     * @inheritDoc
     */
    public $css = [
        'app.css'
    ];
}