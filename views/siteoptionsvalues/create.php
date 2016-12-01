<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model porcelanosa\yii2siteoptions\models\SiteOptionsValues */

$this->title = Yii::t('backend', 'Create Site Options Values');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Site Options Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-options-values-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
