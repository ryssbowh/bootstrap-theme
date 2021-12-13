<?php
namespace Ryssbowh\BootstrapTheme\helpers;

use OzdemirBurak\Iris\Color\Hex;
use craft\helpers\StringHelper;

class ColorHelper
{   
    /**
     * Converts a named color from hex to another format
     * The end of the name will define the other format, example 'color-rgb' or 'color-hsv'
     * 
     * @param  string $name
     * @param  string $value
     * @return string
     */
    public static function convertNamedColor(string $name, string $value, bool $onlyNumbers = true): string
    {
        if (StringHelper::endsWith($name, '-rgb')) {
            return static::convertHexToRgb($value, $onlyNumbers);
        } else if (StringHelper::endsWith($name, '-hsl')) {
            return static::convertHexToHsl($value, $onlyNumbers);
        } else if (StringHelper::endsWith($name, '-hsv')) {
            return static::convertHexToHsv($value, $onlyNumbers);
        }
        return $value;
    }

    /**
     * Convert a hex color into rgb
     * 
     * @param  string  $value
     * @param  boolean $onlyNumbers
     * @return string
     */
    public static function convertHexToRgb(string $value, bool $onlyNumbers = true): string
    {
        $rgb = (new Hex($value))->toRgb();
        if ($onlyNumbers) {
            return implode(', ', $rgb->values());
        }
        return (string)$rgb;
    }

    /**
     * Convert a hex color into rgb
     * 
     * @param  string  $value
     * @param  boolean $onlyNumbers
     * @return string
     */
    public static function convertHexToHsl(string $value, bool $onlyNumbers = true): string
    {
        $hsl = (new Hex($value))->toHsl();
        if ($onlyNumbers) {
            return implode(', ', $hsl->values());
        }
        return (string)$hsl;
    }

    /**
     * Convert a hex color into hsv
     * 
     * @param  string  $value
     * @param  boolean $onlyNumbers
     * @return string
     */
    public static function convertHexToHsv(string $value, bool $onlyNumbers = true): string
    {
        $hsv = (new Hex($value))->toHsv();
        if ($onlyNumbers) {
            return implode(', ', $hsv->values());
        }
        return (string)$hsv;
    }
}