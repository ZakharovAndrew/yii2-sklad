<?php

namespace ZakharovAndrew\sklad\models;

use Yii;
use \yii\helpers\ArrayHelper;
use ZakharovAndrew\sklad\Module;

/**
 * This is the model class for table "production".
 *
 * @property int $id
 * @property string $datetime_day
 * @property int $product_id
 * @property int $product_count
 */
class Production extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'production';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['datetime_day', 'product_id', 'product_count', 'user_id'], 'required'],
            [['datetime_day'], 'safe'],
            [['product_id', 'product_count', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'datetime_day' => 'Day',
            'product_id' => 'Product ID',
            'product_count' => Module::t('Product Count'),
        ];
    }
    
    public static function getAllDaysOfMonth($month)
    {
        $firstDay = new \DateTime($month);
        $lastDay = new \DateTime($firstDay->format('Y-m-t'));

        $interval = new \DateInterval('P1D');
        $period = new \DatePeriod($firstDay, $interval, $lastDay);

        $days = [];
        foreach ($period as $day) {
            $days[] = $day->format('Y-m-d');
        }

        return $days;
    }
    
    /**
     * Get data for a period
     * 
     * @param string $start_date
     * @param string $stop_date
     * @return type
     */
    public static function getByPeriod($start_date, $stop_date)
    {
        $arr = static::find()
                //->select(['date(datetime_day) as day', 'sum(product_count) as cnt', 'product_id'])
                ->select(['date(datetime_day) as day', 'product_count as cnt', 'product_id', 'id'])
                ->where(['>=', 'datetime_day', $start_date])
                ->andWhere(['<', 'datetime_day', $stop_date])
                //->groupBy('day, product_id')
                ->asArray()
                ->all();
        
        $result = [];
        
        foreach ($arr as $item) {
            $result[$item['day']][$item['product_id']]['cnt'] = $item['cnt'];
            $result[$item['day']][$item['product_id']]['id'] = $item['id'];
        }
        
        return $result;
    }
    
}
