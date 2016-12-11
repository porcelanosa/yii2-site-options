<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use porcelanosa\yii2siteoptions\Module;

/* @var $this yii\web\View */
/* @var $model porcelanosa\yii2siteoptions\models\Siteoptions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siteoptions-form container-fluid">

    <?php $form = ActiveForm::begin(); ?>

    <?
    // получаем Типы параметров
    $site_option_types = \porcelanosa\yii2siteoptions\models\SiteOptionsTypes::find()->all();
    // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
    $site_option_types_items = ArrayHelper::map($site_option_types, 'id', 'type_name');
    ?>
    <?= $form->field($model, 'option_type_id')->dropDownList($site_option_types_items, ['prompt' => 'Выберите тип поля']) ?>

    <?= $form->field($model, 'option_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'option_alias')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'active')->checkbox() ?></div>
        <div class="col-md-6">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
