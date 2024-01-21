<?php

namespace ZakharovAndrew\sklad\models;

use Yii;
use ZakharovAndrew\sklad\Module;

/**
 * This is the model class for table "product_materials".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $material_id
 * @property int|null $material_count
 * @property string|null $comments
 */
class ProductMaterials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_materials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'material_id', 'material_count'], 'integer'],
            [['product_id', 'material_id', 'material_count'], 'required'],
            [['comments'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => Module::t('Product'),
            'material_id' => Module::t('Material'),
            'material_count' => Module::t('Material Count'),
            'comments' => Module::t('Comments'),
        ];
    }
    
    public static function getListByProduct($id)
    {
        
    }
}
