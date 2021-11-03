<?php 

namespace Ryssbowh\BootstrapTheme;

use Ryssbowh\BootstrapTheme\assets\bundles\CpAssets;
use Ryssbowh\BootstrapTheme\assets\bundles\FrontAssets;
use Ryssbowh\BootstrapTheme\models\ThemePreferences;
use Ryssbowh\BootstrapTheme\models\blockProviders\BootstrapBlockProvider;
use Ryssbowh\BootstrapTheme\models\fieldDisplayers\AssetCarousel;
use Ryssbowh\CraftThemes\Themes;
use Ryssbowh\CraftThemes\base\ThemePlugin;
use Ryssbowh\CraftThemes\controllers\CpBlocksController;
use Ryssbowh\CraftThemes\controllers\CpDisplayController;
use Ryssbowh\CraftThemes\events\FieldDisplayerEvent;
use Ryssbowh\CraftThemes\events\RegisterBlockProviders;
use Ryssbowh\CraftThemes\events\RegisterBundles;
use Ryssbowh\CraftThemes\interfaces\ThemePreferencesInterface;
use Ryssbowh\CraftThemes\services\BlockProvidersService;
use Ryssbowh\CraftThemes\services\FieldDisplayerService;
use yii\base\Event;

class Theme extends ThemePlugin
{
    /**
     * @inheritDoc
     */
    protected $assetBundles = [
        '*' => [
            FrontAssets::class
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
        Event::on(CpDisplayController::class, CpDisplayController::REGISTER_ASSET_BUNDLES, function (RegisterBundles $event) {
            $event->bundles[] = CpAssets::class;
        });
        Event::on(CpBlocksController::class, CpBlocksController::REGISTER_ASSET_BUNDLES, function (RegisterBundles $event) {
            $event->bundles[] = CpAssets::class;
        });
        Event::on(FieldDisplayerService::class, FieldDisplayerService::REGISTER_DISPLAYERS, function (FieldDisplayerEvent $event) {
            $event->register(AssetCarousel::class);
        });
    }

    /**
     * @inheritDoc
     */
    protected function defineRegions(): ?array
    {
        return [
            [
                'handle' => 'before-header',
                'name' => \Craft::t('bootstrap-theme', 'Before Header'),
                'width' => '100%',
            ],
            [
                'handle' => 'header-left',
                'name' => \Craft::t('bootstrap-theme', 'Header Left'),
                'width' => '32%',
            ],
            [
                'handle' => 'header-middle',
                'name' => \Craft::t('bootstrap-theme', 'Header Middle'),
                'width' => '32%',
            ],
            [
                'handle' => 'header-right',
                'name' => \Craft::t('bootstrap-theme', 'Header Right'),
                'width' => '32%',
            ],
            [
                'handle' => 'after-header',
                'name' => \Craft::t('bootstrap-theme', 'After Header'),
                'width' => '100%',
            ],
            [
                'handle' => 'banner',
                'name' => \Craft::t('bootstrap-theme', 'Banner'),
                'width' => '100%',
            ],
            [
                'handle' => 'before-content',
                'name' => \Craft::t('bootstrap-theme', 'Before Content'),
                'width' => '100%',
            ],
            [
                'handle' => 'sidebar',
                'name' => \Craft::t('bootstrap-theme', 'Sidebar'),
                'width' => '32%',
            ],
            [
                'handle' => 'content',
                'name' => \Craft::t('bootstrap-theme', 'Content'),
                'width' => '66%',
            ],
            [
                'handle' => 'after-content',
                'name' => \Craft::t('bootstrap-theme', 'After Content'),
                'width' => '100%',
            ],
            [
                'handle' => 'before-footer',
                'name' => \Craft::t('bootstrap-theme', 'Before Footer'),
                'width' => '100%',
            ],
            [
                'handle' => 'footer-left',
                'name' => \Craft::t('bootstrap-theme', 'Footer Left'),
                'width' => '32%',
            ],
            [
                'handle' => 'footer-middle',
                'name' => \Craft::t('bootstrap-theme', 'Footer Middle'),
                'width' => '32%',
            ],
            [
                'handle' => 'footer-right',
                'name' => \Craft::t('bootstrap-theme', 'Footer Right'),
                'width' => '32%',
            ],
            [
                'handle' => 'after-footer',
                'name' => \Craft::t('bootstrap-theme', 'After Footer'),
                'width' => '100%',
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function getPreferencesModel(): ThemePreferencesInterface
    {
        return new ThemePreferences;
    }

    /**
     * @inheritDoc
     */
    public function afterThemeInstall()
    {
        if ($this->hasDataInstalled()) {
            return;
        }
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
        $defaultLayout->addBlock($block, 'header-middle');
        $block = Themes::$plugin->blocks->create([
            'provider' => 'forms',
            'handle' => 'search'
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