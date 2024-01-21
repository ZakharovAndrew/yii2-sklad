<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\ProductMaterials $model */

$this->title = 'Create Product Materials';
$this->params['breadcrumbs'][] = ['label' => 'Product Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-materials-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_add_material', [
        'model' => $model,
    ]) ?>

</div>
