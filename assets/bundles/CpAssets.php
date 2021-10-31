<?php
namespace Ryssbowh\BootstrapTheme\assets\bundles;

use Ryssbowh\CraftThemes\assets\BlocksAssets;
use craft\web\AssetBundle;

class CpAssets extends AssetBundle
{
    public $sourcePath = __DIR__ . '/../dist/cp';
    
    public $js = [
        'vendor~cp.js',
        'cp.js'
    ];
}