<?php
namespace Ryssbowh\BootstrapTheme\events;

use Ryssbowh\BootstrapTheme\Theme;
use Ryssbowh\BootstrapTheme\exceptions\BootstrapThemeException;
use yii\base\Event;

class SettingsEvent extends Event
{
    /**
     * @var array
     */
    protected $_customs = [];

    /**
     * @var array
     */
    protected $_fonts = [
        [
            'fonts' => [
                'Roboto',
                'Ubuntu'
            ],
            'url' => 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap'
        ]
    ];

    /**
     * Custom roots getter
     * 
     * @return array
     */
    public function getCustoms(): array
    {
        return $this->_customs;
    }

    /**
     * Fonts getter
     * 
     * @return array
     */
    public function getFonts(): array
    {
        return $this->_fonts;
    }

    /**
     * Add a custom root variable
     * 
     * @param string $name
     * @param $type The type of field used in the settings (text, select, color etc)
     * @param $section
     * @param $value
     * @param array $options Options as used by the type of field
     */
    public function addRoot(string $name, string $type, string $section, $value, array $options = [])
    {
        if (in_array($name, array_keys(Theme::$plugin->settings->roots))) {
            throw BootstrapThemeException::rootDefined($name);
        }
        $this->_customs[$section][$name] = [
            'type' => $type,
            'value' => $value,
            'options' => $options
        ];
    }

    /**
     * Add a font
     * 
     * @param array $fonts
     * @param string $url
     */
    public function addFont(array $fonts, string $url)
    {
        $this->_fonts[] = [
            'fonts' => $fonts,
            'url' => $url
        ];
    }
}