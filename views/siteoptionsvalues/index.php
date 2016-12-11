<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use porcelanosa\yii2siteoptions\SiteOptionsWidget;

/* @var $this yii\web\View */
/* @var $searchModel porcelanosa\yii2siteoptions\models\search\SiteOptionsValuesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
 * @var $options \porcelanosa\yii2siteoptions\models\SiteOptions[]
 **/
$this->title = Yii::t('site-options', 'Site Options Page');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-options-values-index container-fluid">
    <div class="row">
        <? foreach ($options as $option):?>
            <div class="col-md-6">
                <?
                    $box_border = 'box-solid';
                    $box_color = 'box-default';
                    $box_collapsed = '';
                if($option->type->type_alias == 'rich_text'){
                    $box_border = 'box-solid';
                    $box_color = 'box-primary';
                    $box_collapsed = 'collapsed-box';
                }?>
                <?if($option->type->type_alias == 'image'){
                    $box_border = 'box-solid';
                    $box_color = 'box-danger';
                }?>
                <?if($option->type->type_alias == 'checkbox'){
                    $box_color = 'box-success';
                }?>
                <?= SiteOptionsWidget::widget([
                    'option' => $option,
                    'isInput' => true,
                    'box_border' => $box_border,
                    'box_color' => $box_color,
                    'box_collapsed' => $box_collapsed,
                    'uploadImageUrl' => '@storageUrl/images/siteoptions',
                    'uploadImagePath' => '@storage/images/siteoptions',
                ]) ?>
            </div>
        <? endforeach; ?>
    </div>
</div>
