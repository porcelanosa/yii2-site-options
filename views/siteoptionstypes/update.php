<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model porcelanosa\yii2siteoptions\models\SiteOptionsTypes */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Site Options Types',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Site Options Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="site-options-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
