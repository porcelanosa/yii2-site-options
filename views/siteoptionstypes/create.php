<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model porcelanosa\yii2siteoptions\models\SiteOptionsTypes */

$this->title = Yii::t('backend', 'Create Site Options Types');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Site Options Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-options-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
