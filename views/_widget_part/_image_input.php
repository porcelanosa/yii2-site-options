<?php
/**
 * @var $this View
 * @var $option \porcelanosa\yii2siteoptions\models\SiteOptions
 * @author Alex Porcelanosa
 */
use yii\helpers\Html;
$option_id = $this->context->option->id;
?>
<div class="box box-default collapsed-box option_<?=$option_id?>">
    <div class="box-header with-border">
        <h3 class="box-title" data-widget="collapse"><?=$option->option_name?></h3>
        <!-- <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>/.box-tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        <?=Html::input('text', $option->option_alias, $option->value->value, ['class'=>'text-value-input', 'id'=>
            'value_'.$option_id])?>
        <!--<a class="btn btn-primary"><?/*=Yii::t('site-options', 'Save')*/?></a>-->
        <button type="button" class="btn bg-olive btn-flat margin  saveOption_btn" data-id="<?=$option_id?>" data-typeid="<?=$option->option_type_id?>">
            <?=Yii::t('site-options', 'Save')?>
        </button>
    </div><!-- /.box-body -->
</div><!-- /.box -->