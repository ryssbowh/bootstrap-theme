<?php 

namespace Ryssbowh\BootstrapTheme\models\blocks;

use Ryssbowh\BootstrapTheme\models\blockOptions\PoweredByOptions;
use Ryssbowh\CraftThemes\models\Block;
use Ryssbowh\CraftThemes\models\BlockOptions;

class PoweredByBootstrap extends Block
{
    /**
     * @var string
     */
    public $name = 'Powered By';

    /**
     * @var string
     */
    public static $handle = 'powered-by';
}