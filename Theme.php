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
    public function getRegions(): array
    {
        return [
            new Region([
                'handle' => 'header-left',
                'name' => \Craft::t('themes', 'Header Left'),
                'width' => '49%',
            ]),
            new Region([
                'handle' => 'header-right',
                'name' => \Craft::t('themes', 'Header Right'),
                'width' => '49%',
            ]),
            new Region([
                'handle' => 'banner',
                'name' => \Craft::t('themes', 'Banner'),
                'width' => '100%',
            ]),
            new Region([
                'handle' => 'before-content',
                'name' => \Craft::t('themes', 'Before Content'),
                'width' => '100%',
            ]),
            new Region([
                'handle' => 'content',
                'name' => \Craft::t('themes', 'Content'),
                'width' => '100%',
            ]),
            new Region([
                'handle' => 'after-content',
                'name' => \Craft::t('themes', 'After Content'),
                'width' => '100%',
            ]),
            new Region([
                'handle' => 'footer-left',
                'name' => \Craft::t('themes', 'Footer Left'),
                'width' => '49%',
            ]),
            new Region([
                'handle' => 'footer-right',
                'name' => \Craft::t('themes', 'Footer Right'),
                'width' => '49%',
            ])
        ];
    }

    /**
     * @inheritDoc
     */
    public function afterInstall()
    {
        parent::afterInstall();
        /**
         * Blocks
         */
        $defaultLayout = Themes::$plugin->layouts->getDefault('bootstrap-theme');
        $block = Themes::$plugin->blocks->create([
            'provider' => 'system',
            'handle' => 'content',
            'region' => 'content'
        ]);
        $defaultLayout->addBlock($block);
        $defaultLayout->addBlock($block);
        $block = Themes::$plugin->blocks->create([
            'provider' => 'system',
            'handle' => 'flash-messages',
            'region' => 'before-content'
        ]);
        $defaultLayout->addBlock($block);
        $block = Themes::$plugin->blocks->create([
            'provider' => 'system',
            'handle' => 'sitename',
            'region' => 'header-left'
        ]);
        $defaultLayout->addBlock($block);
        $block = Themes::$plugin->blocks->create([
            'provider' => 'bootstrap',
            'handle' => 'powered-by',
            'region' => 'footer-right'
        ]);
        $defaultLayout->addBlock($block);
        $block = Themes::$plugin->blocks->create([
            'provider' => 'bootstrap',
            'handle' => 'main-menu',
            'region' => 'header-right'
        ]);
        $defaultLayout->addBlock($block);
        $block = Themes::$plugin->blocks->create([
            'provider' => 'bootstrap',
            'handle' => 'footer-menu',
            'region' => 'footer-left'
        ]);
        $defaultLayout->addBlock($block);
        Themes::$plugin->layouts->save($defaultLayout);
    }
}