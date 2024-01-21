<?php

use ZakharovAndrew\sklad\models\Material;
use ZakharovAndrew\sklad\models\MaterialCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use ZakharovAndrew\sklad\Module;

/** @var yii\web\View $this */
/** @var app\models\MaterialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Module::t('Materials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('Create Material'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
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
            [
                'attribute' => 'material_category_id',
                //'format' => 'raw',
                'filter' => MaterialCategory::getList(),
                'value' => function ($model) {
                    return MaterialCategory::getList()[$model->material_category_id] ?? $model->material_category_id;
                }
            ],
            'cost',
            //'units_of_measure',
            //'comments',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Material $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
