<?php
namespace Ryssbowh\BootstrapTheme\assets\bundles;

use Ryssbowh\BootstrapTheme\Theme;
use craft\web\AssetBundle;

class HighlightAssets extends AssetBundle
{
    /**
     * @inheritDoc
     */
    public $sourcePath = __DIR__ . '/..';

    /**
     * @inheritDoc
     */
    public $js = [
        'dist/app/vendor~highlight.js',
        'dist/app/highlight.js'
    ];

    /**
     * @inheritDoc
     */
    public $css = [];

    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->sourcePath = realpath($this->sourcePath);
        $this->css[] = 'lib/highlight-11.3.1/styles/' . Theme::$plugin->settings->codeTheme . '.min.css';
        parent::init();
    }
}