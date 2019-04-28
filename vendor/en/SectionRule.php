<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "{{%section_rule}}".
 *
 * @property int $id ID
 * @property string $section_type_id 收费配置类型ID
 * @property string $start 起始时间
 * @property string $end 结束时间
 * @property string $electrovalence 电价
 * @property string $service 服务费
 */
class SectionRule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section_rule}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_type_id', 'start', 'end'], 'integer'],
            [['electrovalence', 'service', 'section_type_id', 'start', 'end'], 'required'],
            [['electrovalence', 'service'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'section_type_id' => '收费配置类型ID',
            'id' => 'ID',
            'start' => '起始时间',
            'end' => '结束时间',
            'electrovalence' => '电价',
            'service' => '服务费',
        ];
    }

    /**
     * 计算订单金额
     * @param $no
     * @param array $elec
     * @return array|bool
     */
    public static function getOrderMoney($no, $elec = [])
    {
        $data = self::find()->alias('s')
            ->leftJoin(Electricize::tableName() . ' e', 'e.section_id=s.section_type_id')
            ->select(['s.electrovalence', 's.service'])
            ->where(['e.no' => $no])
            ->orderBy('end asc')
            ->asArray()
            ->all();
        if (count($elec) == count($data)) {
            $service = 0;
            $electrovalence = 0;
            foreach ($data as $k => $v) {
                $electrovalence += $v['electrovalence'] * $elec[$k];
                $service += $v['service'] * $elec[$k];
            }
            return ['electrovalence' => $electrovalence, 'service' => $service];
        }
        return false;
    }

}
