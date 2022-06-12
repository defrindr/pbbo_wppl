<?php

namespace app\components\mazer;

use yii\helpers\Json;
use yii\web\View;

/**
 * @inheritdoc
 */
class Tabs extends \app\components\mazer\base\Tabs
{
    /**
     * Registers a specific Bootstrap plugin and the related events
     * @param string $name the name of the Bootstrap plugin
     */
    protected function registerPlugin($name)
    {
        $view = $this->getView();

        $id = $this->options['id'];

        if ($this->clientOptions !== false) {
            $options = empty($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
            $js = "jQuery('#$id').$name($options);";
            $view->registerJs($js);
        }

        $this->registerClientEvents();
    }
    /**
     * Register assetBundle
     */
    public static function registerAssets()
    {
        // BootstrapAsset::register(\Yii::$app->controller->getView());
    }

    /**
     * Remember active tab state for this URL
     */
    public static function rememberActiveState()
    {
        self::registerAssets();
        $js = <<<JS
            jQuery("#relation-tabs > li > a").on("click", function () {
                setStorage(this);
            });

            jQuery(document).on('pjax:end', function() {
               setStorage($('#relation-tabs .active A'));
            });

            jQuery(window).on("load", function () {
               initialSelect();
            });
JS;

        if (\Yii::$app->request->isAjax) {
            return "<script type='text/javascript'>{$js}</script>";
        } else {
            // Register cookie script
            \Yii::$app->controller->getView()->registerJs(
                $js,
                View::POS_END,
                'rememberActiveState'
            );
        }
    }

    /**
     * Clear the localStorage of your browser
     */
    public static function clearLocalStorage()
    {
        // TODO @c.stebe - This removes all cookies, eg. the ones set from Yii 2 debug toolbar
        /*\Yii::$app->controller->getView()->registerJs(
            'window.localStorage.clear();',
            View::POS_READY,
            'clearLocalStorage'
        );*/
    }
}
