<?php

namespace ZakharovAndrew\sklad\models;

use ZakharovAndrew\sklad\Module;
use \yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $images
 * @property string|null $link
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['images'], 'string'],
            [['product_category_id', 'good', 'bad'], 'integer'],
            [['name', 'link', 'comments'], 'string', 'max' => 500],
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
            'images' => Module::t('Links to pictures'),
            'link' => Module::t('Product link'),
            'product_category_id' => Module::t('Category'),
            'good' => Module::t('Good products'),
            'bad' => Module::t('Bad products'),
            'comments' => Module::t('Comments'),
            'materials' => Module::t('Materials'),
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
