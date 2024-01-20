<?php

use ZakharovAndrew\sklad\models\ProductCategory;
use ZakharovAndrew\sklad\models\ProductList;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\modules\sklad\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\ProductListSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$category = ProductCategory::getList()[$searchModel->product_category_id] ?? null;

$this->title = Module::t('Product Lists'). (isset($category) ? ' '.$category : '');
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    .btn-delete {
        display:inline-block;
        padding: 2px 5px;
        font-size:12px;
        background-color: #f44336;
        border-radius: 4px;
        color: #fff;
        text-decoration: none;
    }
    .btn-delete:hover {
        background-color:#d83529
    }
    .product-list-index td:first-child{
        width:280px;
    }
    .product-list-index td:last-child{
        /*width:40%;*/
    }
    .grid-view th {
        white-space: normal;
    }
</style>
<div class="product-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'images',
                'format' => 'raw',
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
                }
            ],
            'name',
            [
                'attribute' => 'product_count',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->product_count.'<br><br><a href="'.Url::toRoute(['create', 'product_id' => $model->product_id]).'" class="btn btn-success">'.Module::t('Add products').'</a>';
                }
            ],
            [
                'format' => 'raw',
                'value' => function ($model) {
                    $pays = ProductList::find()->where(['product_id' => $model->product_id])->orderBy('datetime_pay ASC')->all();
       
                    $result = [];
                    foreach ($pays as $item) {
                        $result[] = '<b>'.$item->product_count. '</b> ('.date('d.m.Y',strtotime($item->datetime_pay)). ') '.$item->cost.' Р <a href="'.Url::toRoute(['delete', 'id' => $item->id]).'" class=" btn-delete">'.Module::t('Delete').'</a><br>';
                    }
                    return implode('', $result);                    
                }
            ],
            [
                'attribute' => 'comments',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->comments . ' <a href="'.Url::toRoute(['/sklad/product/update', 'id' => $model->product_id, 'form'=>'_form_comments_product']).'" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg></a>';
                }
            ],        
            [
                'attribute' => 'good',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->good . ' <a href="'.Url::toRoute(['/sklad/product/update', 'id' => $model->product_id, 'form'=>'_form_good_product']).'" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg></a>';
                }
            ],
            [
                'attribute' => 'bad',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->bad . ' <a href="'.Url::toRoute(['/sklad/product/update', 'id' => $model->product_id, 'form'=>'_form_bad_product']).'" title="Редактировать" aria-label="Редактировать" data-pjax="0"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg></a>';
                }
            ],
        ],
    ]); ?>


</div>
