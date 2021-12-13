<?php
namespace Ryssbowh\BootstrapTheme\assets\bundles;

use craft\web\AssetBundle;

class RootsAssets extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $basePath = '@themesWebPath/bootstrap-theme';

    /**
     * @inheritDoc
     */
    public $baseUrl = '@themesWeb/bootstrap-theme';

    /**
     * @inheritDoc
     */
    public $css = [
        'roots.css'
    ];
}