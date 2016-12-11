<?php
namespace porcelanosa\yii2siteoptions;

use porcelanosa\yii2options\components\helpers\MyHelper;
use porcelanosa\yii2options\models\OptionPresetValues;
use porcelanosa\yii2options\models\Options;
use porcelanosa\yii2options\models\OptionsList;
use porcelanosa\yii2options\models\RichTexts;
use porcelanosa\yii2siteoptions\assets\SiteOptionsAsset;
use porcelanosa\yii2siteoptions\models\SiteOptions;
use Yii;
use yii\base\Exception;
use yii\base\Widget;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\Html;


class SiteOptionsWidget extends Widget
{

    /**
     * @var $option SiteOptions;
     */
    public $option;
    public $isInput = false;
    public $imageSrc = false;
    /* description of box view in admin part */
    public $box_border = "";
    public $box_color = "box-default";
    public $box_collapsed = 'collapsed-box';
    public $uploadImagePath = '@webroot/uploads/siteoptions/'; // '@webroot/uploads/cats/' alias of upload folder
    public $uploadImageUrl = '@web/uploads/siteoptions/'; // '@web/uploads/cats/' alias of upload folder

    public function init()
    {
        parent::init();
        //$this->behavior = $this->model->getBehavior($this->behaviorName);
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        $i18n = Yii::$app->i18n;
        $i18n->translations['site-options-widget'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@porcelanosa/yii2-site-options/messages',
            'fileMap' => [],
        ];
    }


    /** Render widget */
    public function run()
    {
        $type = $this->option->type; // тип параметра
        $view = $this->getView();
        SiteOptionsAsset::register($view);
        //$view->registerJs("$('#{$this->id}').galleryManager({$opts});");

        /*$this->options['id'] = 'opt-widget-' . $this->model->id;
        $this->options['class'] = 'options';*/

        if ($type->type_alias == 'string') {
            if (!$this->isInput) {
                return $this->render('_widget_part/_string',
                    [
                        'option' => $this->option,
                    ]);
            } else {
                return $this->render('_widget_part/_string_input',
                    [
                        'option' => $this->option,
                        'box_border' => $this->box_border,
                        'box_color' => $this->box_color,
                        'box_collapsed' => $this->box_collapsed,
                    ]);
            }
        } elseif ($type->type_alias == 'boolean') {
            if (!$this->isInput) {
                return $this->render('_widget_part/_boolean',
                    [
                        'option' => $this->option,
                    ]);
            } else {
                return $this->render('_widget_part/_boolean_input',
                    [
                        'option' => $this->option,
                        'box_border' => $this->box_border,
                        'box_color' => $this->box_color,
                        'box_collapsed' => $this->box_collapsed,
                    ]);
            }
        } elseif ($type->type_alias == 'image') {
            if (!$this->isInput) {
                return $this->render('_widget_part/_image',
                    [
                        'option' => $this->option,
                        'uploadImagePath' => $this->uploadImagePath,
                        'uploadImageUrl' => $this->uploadImageUrl,
                    ]);
            } elseif($this->imageSrc) {
                return $this->render('_widget_part/_image_src',
                    [
                        'option' => $this->option,
                        'uploadImagePath' => $this->uploadImagePath,
                        'uploadImageUrl' => $this->uploadImageUrl,
                    ]);
            } else {
                return $this->render('_widget_part/_image_input',
                    [
                        'option' => $this->option,
                        'box_border' => $this->box_border,
                        'box_color' => $this->box_color,
                        'box_collapsed' => $this->box_collapsed,
                        'uploadImagePath' => $this->uploadImagePath,
                        'uploadImageUrl' => $this->uploadImageUrl,
                    ]);
            }
        } elseif ($type->type_alias == 'rich_text') {
            if (!$this->isInput) {
                return $this->render('_widget_part/_rich_text',
                    [
                        'option' => $this->option,
                    ]);
            } else {
                return $this->render('_widget_part/_rich_text_input',
                    [
                        'option' => $this->option,
                        'box_border' => $this->box_border,
                        'box_color' => $this->box_color,
                        'box_collapsed' => $this->box_collapsed,
                        'uploadImagePath' => Yii::getAlias($this->uploadImagePath),
                        'uploadImageUrl' => Yii::getAlias($this->uploadImageUrl),
                    ]);
            }
        }
    }

}
