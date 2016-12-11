<?php
/**
 * @var $this View
 * @var $option \porcelanosa\yii2siteoptions\models\SiteOptions
 * @author Alex Porcelanosa
 */
use yii\helpers\Html;

$option_id = $option->id;
?>
<div class="box <?=$box_border?> <?=$box_color?> <?=$box_collapsed?> option_<?= $option_id ?>">
    <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse"><?= $option->option_name ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="form-group">
            <label>
                <?= Html::checkbox($option->option_alias,
                    $option->value->value,
                    [
                        'class' => 'checkbox-value',
                        'id' => 'value_' . $option_id,
                        'data-id' => $option_id,
                        'data-typeid' => $option->option_type_id
                    ]) ?>
                <?= $option->option_name ?>
            </label>
            <span class="checkbox-saving invisible">
                    <i class="fa fa-spinner fa-spin  fa-fw"></i><span class="sr-only">Saving...</span> Saving...
                </span>
        </div>
    </div><!-- /.box-body -->
</div><!-- /.box -->