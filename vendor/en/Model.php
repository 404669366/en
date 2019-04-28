<?php

namespace vendor\en;

use vendor\helpers\Constant;
use Yii;

/**
 * This is the model class for table "{{%model}}".
 *
 * @property int $id
 * @property string $name 电桩型号
 * @property string $power 功率
 * @property string $voltage 电压
 * @property string $current 电流
 * @property string $brand 电桩品牌
 * @property int $type 电桩类型1慢充2快充3均充4轮充
 * @property int $standard 标准1国标2011 2国标2015
 * @property string $created 创建时间
 */
class Model extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%model}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'standard', 'created'], 'integer'],
            [['power', 'voltage', 'current', 'name', 'brand', 'type', 'standard'], 'required'],
            [['name', 'brand'], 'string', 'max' => 20],
            [['power', 'voltage', 'current'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '电桩型号',
            'power' => '功率',
            'voltage' => '电压',
            'current' => '电流',
            'brand' => '电桩品牌',
            'type' => '电桩类型1慢充2快充3均充4轮充',
            'standard' => '标准1国标2011 2国标2015',
            'created' => '创建时间',
        ];
    }

    /**
     * 获取电桩类型数据
     * @return mixed
     */
    public static function getPageData()
    {
        $data = self::find()
            ->page([
                'name' => ['like', 'name'],
                'brand' => ['like', 'brand'],
                'type' => ['=', 'type'],
                'standard'=>['=','standard'],
            ]);
        foreach ($data['data'] as &$v) {
            $v['type'] = Constant::getModelType()[$v['type']];
            $v['standard'] = Constant::getModelStandard()[$v['standard']];
        }
        return $data;
    }
}
