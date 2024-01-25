<?php

namespace ZakharovAndrew\sklad\models;

use ZakharovAndrew\sklad\Module;
use \yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "material".
 *
 * @property int $id
 * @property string $name
 * @property string|null $images
 * @property int $material_category_id
 * @property int|null $cost
 * @property int $units_of_measure
 * @property string|null $comments
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'material_category_id', 'units_of_measure'], 'required'],
            [['images'], 'string'],
            [['material_category_id', 'cost', 'units_of_measure'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name' => Module::t('Name'),
            'images' => Module::t('Images'),
            'material_category_id' => Module::t('Material Category'),
            'cost' => Module::t('Cost'),
            'units_of_measure' => Module::t('Units Of Measure'),
            'comments' => Module::t('Comments'),
        ];
    }
    
    public static function getUnitsOfMeasureList()
    {
        return [
            '1' => Module::t('Kilogram'),
            '2' => Module::t('Gram'),
            '3' => Module::t('Centimeter'),
            '4' => Module::t('Meter'),
            '5' => Module::t('Liter'),
        ];
    }
    
    /**
     * Get an abbreviated list of units of measurement
     * 
     * @return array
     */
    public static function getUnitsOfMeasureShortList()
    {
        return [
            '1' => Module::t('kg'),
            '2' => Module::t('g.'),
            '3' => Module::t('cm'),
            '4' => Module::t('m.'),
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
    
    /**
     * Get the first image of a given size
     * 
     * @param string $size
     * @return type
     */
    public function getFirstImage($size = 'medium')
    {
        if ($this->images == '') {
            return '/img/no-photo.jpg';
        }
        
        $images = explode(',', $this->images);
        
        return '/uploaded_files/'. $images[0].'_img_'.$size.'.jpg';
    }
}
