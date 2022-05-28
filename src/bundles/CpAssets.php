<?php
namespace Ryssbowh\BootstrapTheme\bundles;

use Ryssbowh\CraftThemes\assets\VueAssets;
use craft\web\AssetBundle;

class CpAssets extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = __DIR__ . '/../../cp/dist';

    /**
     * @inheritDoc
     */
    public $js = [
        'cp.js'
    ];

    public $css = [
        'cp.css'
    ];

    public $depends = [
        VueAssets::class
    ];
}