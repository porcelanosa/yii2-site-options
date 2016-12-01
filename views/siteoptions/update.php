<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model porcelanosa\yii2siteoptions\models\Siteoptions */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Siteoptions',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Siteoptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="siteoptions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
