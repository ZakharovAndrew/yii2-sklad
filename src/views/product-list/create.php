<?php

use yii\helpers\Html;
use ZakharovAndrew\sklad\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\ProductList $model */

$this->title = Module::t('Add products');
$this->params['breadcrumbs'][] = ['label' => Module::t('Product Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
