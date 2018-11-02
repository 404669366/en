<?php

namespace vendor\en;

use vendor\helpers\redis;

/**
 * This is the model class for table "{{%en_transformer}}".
 *
 * @property int $id
 * @property string $name 变压器名称
 * @property string $min 最小值
 * @property string $max 最大值
 * @property string $price 价格
 * @property int $sort 排序
 */
class EnTransformerBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%en_transformer}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'max', 'price'], 'required'],
            [['name'], 'unique'],
            [['price'], 'string'],
            [['sort', 'min', 'max'], 'integer'],
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
            'name' => '变压器名称',
            'min' => '最小值',
            'max' => '最大值',
            'price' => '价格',
            'sort' => '排序',
        ];
    }

    /**
     * 获取当前最小范围值
     * @return int|mixed
     */
    public static function getMin()
    {
        $min = self::find()->select(['max(max) as min'])->asArray()->one();
        if ($min && $min['min']) {
            return $min['min'];
        }
        return 0;
    }

    /**
     * 分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        return self::find()
            ->select(['id', 'name', 'min', 'max', 'price', 'sort'])
            ->page([
                'name' => ['like', 'name'],
            ]);
    }

    /**
     * 更新变压器缓存
     * @param bool $del
     */
    public function updateTransformer($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionTransformer', $del);
        } else {
            redis::app()->hSet('ReceptionTransformer', $this->id, json_encode([
                'name' => $this->name, 'min' => $this->min,
                'max' => $this->max, 'price' => $this->price,
                'sort' => $this->sort,
            ]));
        }
    }

    /**
     * 获取变压器缓存
     * @param int $all
     * @return int
     */
    public static function getNowTransformer($all = 0)
    {
        $transformer = redis::app()->hGetAll('ReceptionTransformer');
        foreach ($transformer as $v) {
            $v = json_decode($v, true);
            if ($v['min'] < $all && $all <= $v['max']) {
                return $v['price'];
            }
        }
        return 0;
    }
}
