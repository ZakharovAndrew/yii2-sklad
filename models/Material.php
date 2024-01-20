<?php

namespace ZakharovAndrew\sklad\models;

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
            'name' => 'Name',
            'images' => 'Images',
            'material_category_id' => 'Material Category ID',
            'cost' => 'Cost',
            'units_of_measure' => 'Units Of Measure',
            'comments' => 'Comments',
        ];
    }
}
