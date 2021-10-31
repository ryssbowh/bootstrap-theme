<?php
namespace Ryssbowh\BootstrapTheme\models\blockOptions;

use Ryssbowh\CraftThemes\models\BlockOptions;

class FooterMenuOptions extends BlockOptions
{
    /**
     * @var string
     */
    public $test = true;

    /**
     * @inheritDoc
     */
    public function defineRules(): array
    {
        return array_merge(parent::defineRules(), [
            ['test', 'boolean', 'trueValue' => true, 'falseValue' => false],
        ]);
    }
}
