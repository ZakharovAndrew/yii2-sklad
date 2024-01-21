<?php

use yii\helpers\Html;
use ZakharovAndrew\sklad\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\Product $model */

$this->title = Module::t('Update Product') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('Update');
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render(($form ?? '_form'), [
        'model' => $model,
    ]) ?>

</div>
