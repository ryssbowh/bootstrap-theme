<?php 

namespace Ryssbowh\BootstrapTheme;

use Ryssbowh\BootstrapTheme\assets\bundles\CommonAssets;
use Ryssbowh\BootstrapTheme\models\blockProviders\BootstrapBlockProvider;
use Ryssbowh\CraftThemes\Themes;
use Ryssbowh\CraftThemes\events\RegisterBlockProviders;
use Ryssbowh\CraftThemes\models\Region;
use Ryssbowh\CraftThemes\models\ThemePlugin;
use Ryssbowh\CraftThemes\services\BlockProvidersService;
use craft\elements\GlobalSet;
use craft\fieldlayoutelements\CustomField;
use craft\fields\Assets;
use craft\models\FieldLayout;
use craft\models\FieldLayoutTab;
use craft\volumes\Local;
use craft\web\View;
use yii\base\Event;

class Theme extends ThemePlugin
{
    /**
     * @inheritDoc
     */
    protected $assetBundles = [
        '*' => [
            CommonAssets::class
        ]
    ];

    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();
        Event::on(BlockProvidersService::class, BlockProvidersService::REGISTER_BLOCK_PROVIDERS, function (RegisterBlockProviders $event) {
            $event->add(new BootstrapBlockProvider);
        });
    }

    /**
     * @inheritDoc
     */
    protected function defineRegions(): ?array
    {
        return [
            [
                'handle' => 'header-left',
                'name' => \Craft::t('themes', 'Header Left'),
                'width' => '49%',
            ],
            [
                'handle' => 'header-right',
                'name' => \Craft::t('themes', 'Header Right'),
                'width' => '49%',
            ],
            [
                'handle' => 'banner',
                'name' => \Craft::t('themes', 'Banner'),
                'width' => '100%',
            ],
            [
                'handle' => 'before-content',
                'name' => \Craft::t('themes', 'Before Content'),
                'width' => '100%',
            ],
            [
                'handle' => 'content',
                'name' => \Craft::t('themes', 'Content'),
                'width' => '100%',
            ],
            [
                'handle' => 'after-content',
                'name' => \Craft::t('themes', 'After Content'),
                'width' => '100%',
            ],
            [
                'handle' => 'footer-left',
                'name' => \Craft::t('themes', 'Footer Left'),
                'width' => '49%',
            ],
            [
                'handle' => 'footer-right',
                'name' => \Craft::t('themes', 'Footer Right'),
                'width' => '49%',
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function afterThemeInstall()
    {
        /**
         * Blocks
         */
        $defaultLayout = Themes::$plugin->layouts->getDefault('bootstrap-theme');
        $block = Themes::$plugin->blocks->create([
            'provider' => 'system',
            'handle' => 'content'
        ]);
        $defaultLayout->addBlock($block, 'content');
        $block = Themes::$plugin->blocks->create([
            'provider' => 'system',
            'handle' => 'flash-messages'
        ]);
        $defaultLayout->addBlock($block, 'before-content');
        $block = Themes::$plugin->blocks->create([
            'provider' => 'system',
            'handle' => 'sitename'
        ]);
        $defaultLayout->addBlock($block, 'header-left');
        $block = Themes::$plugin->blocks->create([
            'provider' => 'bootstrap',
            'handle' => 'powered-by'
        ]);
        $defaultLayout->addBlock($block, 'footer-right');
        $block = Themes::$plugin->blocks->create([
            'provider' => 'bootstrap',
            'handle' => 'main-menu'
        ]);
        $defaultLayout->addBlock($block, 'header-right');
        $block = Themes::$plugin->blocks->create([
            'provider' => 'bootstrap',
            'handle' => 'footer-menu'
        ]);
        $defaultLayout->addBlock($block, 'footer-left');
        Themes::$plugin->layouts->save($defaultLayout);
    }
}