<?php 

namespace Ryssbowh\BootstrapTheme\models\blocks;

use Ryssbowh\BootstrapTheme\models\blockOptions\PoweredByOptions;
use Ryssbowh\CraftThemes\models\Block;
use Ryssbowh\CraftThemes\models\BlockOptions;

class FooterMenu extends Block
{
    /**
     * @var string
     */
    public $name = 'Footer menu';

    /**
     * @var string
     */
    public static $handle = 'footer-menu';
}