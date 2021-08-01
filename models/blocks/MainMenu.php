<?php 

namespace Ryssbowh\BootstrapTheme\models\blocks;

use Ryssbowh\BootstrapTheme\models\blockOptions\PoweredByOptions;
use Ryssbowh\CraftThemes\models\Block;
use Ryssbowh\CraftThemes\models\BlockOptions;

class MainMenu extends Block
{
    /**
     * @var string
     */
    public $name = 'Main menu';

    /**
     * @var string
     */
    public static $handle = 'main-menu';
}