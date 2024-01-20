<?php

use ZakharovAndrew\sklad\models\Product;
use ZakharovAndrew\sklad\models\ProductCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use ZakharovAndrew\sklad\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$module = Yii::$app->getModule('sklad');
$this->title = $module->productListTitle;

$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .table td:first-child {
        width:60px;
    }
</style>

<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('Add product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'images',
                'format' => 'raw',
                //'filter' => HrRecruiting::getGraphList(),
                'value' => function ($model) {
                    if (empty($model->images)) {
                        return '';
                    }
                    
                    $result = [];
                    $images = explode('|', $model->images);
                    foreach ($images as $item) {
                        $result[] = '<img src="'.$item.'" class="img-preview">';
                    }
                    
                    return implode('', $result);
                    // return HrRecruiting::getGraphList()[$model->graph] ?? $model->graph;
                }
            ],
            'name',
            [
                'attribute' => 'product_category_id',
                //'format' => 'raw',
                'filter' => ProductCategory::getList(),
                'value' => function ($model) {
                    return ProductCategory::getList()[$model->product_category_id] ?? $model->product_category_id;
                }
            ],       
            'link',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
