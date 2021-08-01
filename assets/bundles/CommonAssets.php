<?php 

namespace Ryssbowh\BootstrapTheme\assets\bundles;

use craft\web\AssetBundle;

class CommonAssets extends AssetBundle
{
    public function init()
    {
        parent::init();
        $manifest = json_decode(file_get_contents(\Yii::getAlias('@themeWeb/manifest.json')), true);
        $this->css[] = \Yii::getAlias('@themeWeb') . '/' . $manifest['vendor~common.css'];
        $this->css[] = \Yii::getAlias('@themeWeb') . '/' . $manifest['common.css'];
        $this->js[] = \Yii::getAlias('@themeWeb') . '/' . $manifest['vendor~common.js'];
        $this->js[] = \Yii::getAlias('@themeWeb') . '/' . $manifest['common.js'];
    }
}