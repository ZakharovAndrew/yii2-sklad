<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MaterialCategory $model */

$this->title = 'Update Material Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="material-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
