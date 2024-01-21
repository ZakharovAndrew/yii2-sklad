<?php

namespace ZakharovAndrew\sklad\models;

use ZakharovAndrew\sklad\Module;
use \yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "material_category".
 *
 * @property int $id
 * @property string $name
 */
class MaterialCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
