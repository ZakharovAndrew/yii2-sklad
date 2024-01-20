<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\MaterialCategory $model */

$this->title = 'Create Material Category';
$this->params['breadcrumbs'][] = ['label' => 'Material Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
