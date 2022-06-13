<?php
namespace Ryssbowh\BootstrapTheme\bundles;

use Ryssbowh\BootstrapTheme\Theme;
use Ryssbowh\CraftThemes\scss\ScssAssetBundle;

/**
 * Bundle to use when using php scss compiling
 */
class FrontCssAssets extends ScssAssetBundle
{
    public $theme = 'bootstrap-theme';

    public $basePath = '@themeWebPath';

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();
        $parsed = parse_url(\Craft::getAlias('@themeWeb'));
        $this->baseUrl = $parsed['path'];
        $this->scssFiles[Theme::$plugin->settings->scssEntryPoint] = 'app.css';
    }

    /**
     * @inheritDoc
     */
    public function registerAssetFiles($view)
    {
        $manifestFile = \Craft::getAlias('@themeWebPath/manifest.json');
        if (file_exists($manifestFile)) {
            $manifest = json_decode(file_get_contents($manifestFile), true);
            $this->css[] = $manifest['app.css'];
        }
        parent::registerAssetFiles($view);
    }

    /**
     * @inheritDoc
     */
    protected function isCompilingEnabled(): bool
    {
        $enabled = Theme::$plugin->settings->compileScss;
        return (parent::isCompilingEnabled() and $enabled);
    }
}