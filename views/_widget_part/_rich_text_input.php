<?
use yii\helpers\Html;
use vova07\imperavi\Widget as Redactor;
use \yii\helpers\Url;

/**
 * @var $this \yii\web\View
 * @var $option SiteOptions
 */


$option_id = $option->id;
$value = $option->value->value;
?>
<div id="rich-text-<?= $option->option_alias ?>">
    <div class="box <?=$box_border?> <?=$box_color?>  <?=$box_collapsed?> option_<?= $option_id ?>">
        <div class="box-header with-border">
            <h3 class="box-title" data-widget="collapse"><?= $option->option_name ?></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?= Html::textarea(
                $option->option_alias,
                $option->value->text_value,
                [
                    'id' => 'rich_text_' . $option_id,
                ]
            ) ?>
            <?= Redactor::widget(
                [
                    'selector' => '#' . 'rich_text_' . $option_id,
                    'settings' => [
                        'lang' => 'ru',
                        'minHeight' => 200,
                        'maxHeight' => 600,
                        'structure' => true,
                        'imageManagerJson' => Url::to(['/siteOptions/siteoptionsapi/images-get']),
                        'fileManagerJson' => Url::to(['/siteOptions/siteoptionsapi/files-get']),
                        'imageUpload' => Url::to(['/siteOptions/siteoptionsapi/image-upload']),
                        'fileUpload' => Url::to(['/siteOptions/siteoptionsapi/file-upload']),
                        'plugins' => [
                            'clips',
                            'fullscreen',
                            'imagemanager'
                        ]
                    ]
                ]
            );
            ?>
            <button type="button" class="btn bg-olive btn-flat margin  saveOptionText_btn" data-id="<?=$option_id?>" data-typealias="<?=$option->type->type_alias?>">
                <?=Yii::t('site-options', 'Save')?>
            </button>
        </div>
    </div>
</div>
		