<?php

use yii\helpers\Html;
use yii\helpers\Url;
use ZakharovAndrew\sklad\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\ProductionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Module::t('Production');
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    .img-preview {height:75px}
</style>
<div class="production-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th></th>
                <th><?= Module::t('Name') ?></th>
                <?php foreach ($days as $day) { ?>
                    <th><?= date('d.m', strtotime($day))?></th>
                <?php } ?>
            </tr>
            <?php foreach ($products as $product) { ?>
            <tr>
                <td><img src="<?= $product->getFirstImage() ?>" class="img-preview"></td>
                <td><?= $product->name ?></td>
                <?php foreach ($days as $day) { ?>
                    <td class="day">
                        <?= $data[$day][$product->id]['cnt'] ?? '' ?>
                        <?php if (isset($data[$day][$product->id]['cnt'])) { ?>
                        <a href="<?= Url::toRoute(['update', 'id' => $data[$day][$product->id]['id']]); ?>"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg></a>
                        <?php } else { ?>
                        <a href="<?= Url::toRoute(['create', 'product_id' => $product->id, 'day' => date('Y-m-d', strtotime($day))]); ?>"><svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg></a>
                        <?php } ?>
                    </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>
