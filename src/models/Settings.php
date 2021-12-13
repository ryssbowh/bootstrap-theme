<?php
namespace Ryssbowh\BootstrapTheme\models;

use Ryssbowh\BootstrapTheme\Theme;
use Ryssbowh\BootstrapTheme\events\SettingsEvent;
use Ryssbowh\BootstrapTheme\helpers\ColorHelper;
use craft\base\Model;
use craft\helpers\FileHelper;
use craft\web\UploadedFile;

class Settings extends Model
{
    const EVENT_SETTINGS = 'bootstrap-theme-settings';
    
    /**
     * @var array
     */
    public $roots = [];

    /**
     * @var array
     */
    public $customRoots = [];

    /**
     * @var array
     */
    public $fonts = ['Roboto'];

    /**
     * @var string
     */
    public $logo = '';

    /**
     * @var string
     */
    public $favicon = '';

    /**
     * @var bool
     */
    public $deleteLogo;

    /**
     * @var bool
     */
    public $deleteFavicon;

    /**
     * @var array
     */
    protected $_rootsDefinitions;

    /**
     * @var array
     */
    protected $_fontsDefinitions;

    /**
     * @var array
     */
    protected $_defaultRoots = [
        'bs-body-color' => '#212529',
        'bs-body-bg' => '#ffffff',
        'bs-body-font-size' => '1rem',
        'bs-body-font-weight' => 400,
        'bs-body-line-height' => 1.5,
        'bs-body-font-family' => 'Ubuntu',
        'header-bg' => '#0d6efd',
        'footer-bg' => '#0d6efd',
    ];

    /**
     * @var string
     */
    public $codeTheme = 'default-dark';

    /**
     * @inheritDoc
     */
    public function __construct($config = [])
    {
        $this->roots = $this->_defaultRoots;
        parent::__construct($config);
    }

    /**
     * @inheritDoc
     */
    public function defineRules(): array
    {
        return [
            [['roots', 'customRoots', 'fonts'], 'safe'],
            ['logo', 'file', 'extensions' => ['jpg', 'jpeg', 'gif', 'png', 'svg']],
            ['favicon', 'file', 'extensions' => ['jpg', 'jpeg', 'gif', 'png', 'svg', 'ico']],
            ['deleteLogo', function () {
                FileHelper::unlink(\Craft::getAlias($this->logo));
                $this->logo = '';
            }],
            ['deleteFavicon', function () {
                FileHelper::unlink(\Craft::getAlias($this->favicon));
                $this->favicon = '';
            }]
        ];
    }

    /**
     * @inheritDoc
     */
    public function afterValidate()
    {
        if ($file = UploadedFile::getInstanceByName('settings[logo]')) {
            $path = '@themesWebPath/bootstrap-theme/logo.' . $file->extension;
            $file->saveAs(\Craft::getAlias($path));
            $this->logo = $path;
        }
        if ($file = UploadedFile::getInstanceByName('settings[favicon]')) {
            $path = '@themesWebPath/bootstrap-theme/favicon.' . $file->extension;
            $file->saveAs(\Craft::getAlias($path));
            $this->favicon = $path;
        }
    }

    /**
     * Get the logo url, returns default one if custom is not uploaded
     * 
     * @return string
     */
    public function getLogoUrl(): string
    {   
        if ($this->logo) {
            $path = \Craft::getAlias($this->logo);
            if (file_exists($path)) {
                $url = str_replace(\Craft::getAlias('@themesWebPath'), \Craft::getAlias('@themesWeb'), $path);
                return $url . '?v=' . filemtime($path);
            }
        }
        return Theme::$plugin->getAssetUrl('assets/images/logo.svg');
    }

    /**
     * Get the favicon url, returns default one if custom is not uploded
     * 
     * @return string
     */
    public function getFaviconUrl(): string
    {   
        if ($this->favicon) {
            $path = \Craft::getAlias($this->favicon);
            if (file_exists($path)) {
                $url = str_replace(\Craft::getAlias('@themesWebPath'), \Craft::getAlias('@themesWeb'), $path);
                return $url . '?v=' . filemtime($path);
            }
        }
        return Theme::$plugin->getAssetUrl('assets/images/favicon.png');
    }

    /**
     * Get default css roots
     * 
     * @return array
     */
    public function getDefaultRoots(): array
    {
        return $this->_defaultRoots;
    }

    /**
     * Get css root definitions
     * 
     * @return array
     */
    public function getRootsDefinitions(): array
    {
        if ($this->_rootsDefinitions === null) {
            $this->registerSettings();
        }
        return $this->_rootsDefinitions;
    }

    /**
     * Get font definitions
     * 
     * @return array
     */
    public function getFontsDefinitions(): array
    {
        if ($this->_fontsDefinitions === null) {
            $this->registerSettings();
        }
        return $this->_fontsDefinitions;
    }

    /**
     * Write css root file in the @themesWebPath folder
     */
    public function writeRootFile()
    {
        $roots = [];
        foreach ($this->roots as $name => $value) {
            $roots[] = "\t--$name: " . ColorHelper::convertNamedColor($name, $value) . ';';
        }
        foreach ($this->rootsDefinitions as $section => $customs) {
            foreach ($customs as $name => $custom) {
                if ($custom['type'] == 'color') {
                    $roots[] = "\t--$name: " . ColorHelper::convertNamedColor($name, $this->customRoots[$name]) . ';';
                } else {
                    $roots[] = "\t--$name: $value;";
                }
            }
        }
        $content = ":root {\n" . implode("\n", $roots) . "\n}";
        FileHelper::writeToFile(\Craft::getAlias('@themesWebPath/bootstrap-theme/roots.css'), $content);
    }

    /**
     * Register settings through events to allow other plugins to register css roots or fonts
     */
    public function registerSettings()
    {
        $event = new SettingsEvent;
        $this->trigger(self::EVENT_SETTINGS, $event);
        $this->_rootsDefinitions = $event->customs;
        $this->_fontsDefinitions = $event->fonts;
    }

    /**
     * Get defined fonts labels indexed by font names
     * 
     * @return aray
     */
    public function getAllFontsLabels(): array
    {
        $fonts = [];
        foreach ($this->fontsDefinitions as $font) {
            $fonts = array_merge($fonts, $font['fonts']);
        }
        return array_combine($fonts, $fonts);
    }

    /**
     * Register the selected fonts on the view
     */
    public function registerFont()
    {
        if (!isset($this->roots['bs-body-font-family'])) {
            return;
        }
        $url = null;
        foreach ($this->fontsDefinitions as $font) {
            if (in_array($this->roots['bs-body-font-family'], $font['fonts'])) {
                $url = $font['url'];
                break;
            }
        }
        if (!$url) {
            return;
        }
        $parsed = parse_url($url);
        \Craft::$app->view->registerLinkTag(['rel' => 'preconnect', 'href' => $parsed['scheme'] . '://' . $parsed['host']], 'bootstrap-font-pre');
        \Craft::$app->view->registerLinkTag(['href' => $url, 'crossorigin' => true, 'rel' => 'stylesheet'], 'bootstrap-font');
    }

    /**
     * Get all defined highlight themes for code displayer 
     * 
     * @return array
     */
    public function getCodeThemes(): array
    {
        $folder = \Craft::getAlias('@Ryssbowh/BootstrapTheme/assets/lib/highlight-11.3.1/styles');
        $files = glob($folder . '/*');
        $themes = [];
        foreach ($files as $file) {
            $file = str_replace($folder . '/', '', $file);
            $file = str_replace('.min.css', '', $file);
            $themes[$file] = $file;
        }
        return $themes;
    }
}