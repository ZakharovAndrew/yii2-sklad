<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\sklad\Module;

/** @var yii\web\View $this */
/** @var app\models\ProductList $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('Product Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_id',
            'product_count',
            'link',
            'datetime_at',
            'datetime_pay',
        ],
    ]) ?>

</div>
