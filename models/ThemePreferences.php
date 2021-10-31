<?php
namespace Ryssbowh\BootstrapTheme\models;

use Ryssbowh\CraftThemes\interfaces\FieldInterface;
use Ryssbowh\CraftThemes\interfaces\GroupInterface;
use Ryssbowh\CraftThemes\interfaces\RegionInterface;
use Ryssbowh\CraftThemes\base\ThemePreferences as BaseThemePreferences;

class ThemePreferences extends BaseThemePreferences
{
    protected $_regionClasses = [
        'before-header' => ['col-12'],
        'header-left' => ['col-12', 'col-lg-4'],
        'header-middle' => ['col-12', 'col-lg-4'],
        'header-right' => ['col-12', 'col-lg-4'],
        'after-header' => ['col-12'],
        'banner' => [],
        'before-content' => ['col-12'],
        'after-content' => ['col-12'],
        'before-footer' => ['col-12'],
        'footer-left' => ['col-12', 'col-lg-4'],
        'footer-middle' => ['col-12', 'col-lg-4', 'text-center'],
        'footer-right' => ['col-12', 'col-lg-4', 'text-right'],
        'after-footer' => ['col-12'],
    ];

    public function getFieldContainerClasses(FieldInterface $field): array
    {
        return array_merge(parent::getFieldContainerClasses($field), ['mb-3']);
    }

    public function getGroupContainerClasses(GroupInterface $group): array
    {
        return array_merge(parent::getGroupContainerClasses($group), ['mb-3']);
    }

    public function getGroupLabelClasses(GroupInterface $group): array
    {
        return array_merge(parent::getGroupLabelClasses($group), ['font-weight-bold']);
    }

    public function getFieldLabelClasses(FieldInterface $field): array
    {
        return array_merge(parent::getFieldLabelClasses($field), ['font-weight-bold']);
    }

    public function getRegionClasses(RegionInterface $region): array
    {
        return array_merge(parent::getRegionClasses($region), $this->_regionClasses[$region->handle] ?? []);
    }
}