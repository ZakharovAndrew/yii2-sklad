<?php

use yii\helpers\Html;
use app\modules\sklad\Module;

/** @var yii\web\View $this */
/** @var app\models\ProductList $model */

$this->title = 'Update Product List: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('Product Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('Update');
?>
<div class="product-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
