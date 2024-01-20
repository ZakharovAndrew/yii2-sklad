<?php

use app\modules\sklad\models\ProductList;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var aapp\modules\sklad\models\ProductListSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Product Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'product_count',
            'link',
            'datetime_at',
            //'datetime_pay',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ProductList $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
