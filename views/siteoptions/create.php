<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model porcelanosa\yii2siteoptions\models\Siteoptions */

$this->title = Yii::t('backend', 'Create Siteoptions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Siteoptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siteoptions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
