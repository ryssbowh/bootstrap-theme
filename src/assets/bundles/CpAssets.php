<?php
namespace Ryssbowh\BootstrapTheme\assets\bundles;

use craft\web\AssetBundle;

class CpAssets extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = __DIR__ . '/../dist/cp';

    /**
     * @inheritDoc
     */
    public $js = [
        'vendor~cp.js',
        'cp.js'
    ];

    /**
     * @inheritDoc
     */
    public $css = [
        'cp.css'
    ];
}