<?php

use ZakharovAndrew\sklad\models\Product;
use ZakharovAndrew\sklad\models\ProductCategory;
use ZakharovAndrew\sklad\models\ProductMaterials;
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
                'attribute' => 'materials',
                'format' => 'raw',
                'value' => function ($model) {
                    $materials = ProductMaterials::getMaterials($model->id);
                    $result = [];
                    foreach ($materials as $material) {
                        $result[] = $material['name'] . ' ' .
                        Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg>', ['delete-material', 'id' => $material['product_materials_id']], ['class' => 'material'])
                                .'<br>';
                    }
                    return implode('', $result) . Html::a(Module::t('Add material'), ['add-material', 'id' => $model->id], ['class' => 'btn btn-success']);
                    //return ProductCategory::getList()[$model->product_category_id] ?? $model->product_category_id;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
