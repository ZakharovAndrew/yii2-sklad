<?php

namespace ZakharovAndrew\sklad\models;

use ZakharovAndrew\sklad\Module;
use \yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property int $id
 * @property string|null $name
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Module::t('Name'),
        ];
    }
    
    public static function getList()
    {
        $arr = static::find()
                ->select(['id', 'name'])
                ->cache(600)
                ->asArray()
                ->all();
        
        return ArrayHelper::map($arr, 'id', 'name');
    }
}
