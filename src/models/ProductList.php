<?php

namespace ZakharovAndrew\sklad\models;

use Yii;
use ZakharovAndrew\sklad\Module;

/**
 * This is the model class for table "product_list".
 *
 * @property int $id
 * @property int $product_id
 * @property int $product_count
 * @property string $link
 * @property string $datetime_at
 * @property string|null $datetime_pay
 */
class ProductList extends \yii\db\ActiveRecord
{
    public $images;
    public $name;
    public $product_category_id;
    public $bad;
    public $good;
    public $comments;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'product_count', 'cost'], 'required'],
            [['product_id', 'product_count', 'cost', 'bad', 'good'], 'integer'],
            [['datetime_at', 'datetime_pay'], 'safe'],
            [['link', 'comments'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'product_count' => Module::t('Product Count'),
            'link' => Module::t('Link'),
            'datetime_at' => 'Datetime At',
            'datetime_pay' => Module::t('Date of purchase'),
            'name' => Module::t('Name'),
            'images' => Module::t('Images'),
            'cost' => Module::t('Cost'),
            'good' => Module::t('Good products'),
            'bad' => Module::t('Bad products'),
            'comments' => Module::t('Comments')
        ];
    }
}
