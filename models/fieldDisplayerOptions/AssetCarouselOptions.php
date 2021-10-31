<?php
namespace Ryssbowh\BootstrapTheme\models\fieldDisplayerOptions;

use Ryssbowh\CraftThemes\models\fieldDisplayerOptions\AssetRenderedOptions;

class AssetCarouselOptions extends AssetRenderedOptions
{
    /**
     * @var boolean
     */
    public $showControls = true;

    /**
     * @var boolean
     */
    public $showIndicators = false;

    /**
     * @var boolean
     */
    public $disableTouch = false;

    /**
     * @var boolean
     */
    public $fadeAnimation = false;

    /**
     * @var boolean
     */
    public $autoStart = true;

    /**
     * @var boolean
     */
    public $interval = 5000;

    /**
     * @var boolean
     */
    public $pause = true;

    /**
     * @var boolean
     */
    public $infinite = true;

    /**
     * @var boolean
     */
    public $disableKeyboard = false;

    /**
     * @inheritDoc
     */
    public function defineRules(): array
    {
        return array_merge(parent::defineRules(), [
            [['showControls', 'showIndicators', 'disableTouch', 'fadeAnimation', 'autoStart', 'pause', 'infinite', 'disableKeyboard'], 'boolean', 'trueValue' => true, 'falseValue' => false],
            ['interval', 'integer', 'min' => 100]
        ]);
    }
}