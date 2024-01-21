<?php

use yii\helpers\Html;
use ZakharovAndrew\sklad\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\sklad\models\MaterialCategory $model */

$this->title = Module::t('Create Material Category');
$this->params['breadcrumbs'][] = ['label' => Module::t('Material Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
