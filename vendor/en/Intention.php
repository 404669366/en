<?php

namespace vendor\en;

use vendor\helpers\Constant;

/**
 * This is the model class for table "{{%intention}}".
 *
 * @property int $id
 * @property string $user_id 场地方ID
 * @property int $field_id 场地ID
 * @property int $no 意向编号
 * @property string $money 预购金额
 * @property string $contract_photo 投资合同
 * @property string $ratio 分成比例
 * @property string $created 创建时间
 */
class Intention extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%intention}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'field_id'], 'integer'],
            [['money', 'ratio', 'created'], 'string', 'max' => 255],
            [['contract_photo'], 'string', 'max' => 1000],
            [['no'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no' => '意向编号',
            'user_id' => '场地方ID',
            'field_id' => '场地ID',
            'money' => '预购金额',
            'contract_photo' => '投资合同',
            'ratio' => '分成比例',
            'created' => '创建时间',
        ];
    }

    /**
     * 关联普通用户表获取投资人信息
     * @return \yii\db\ActiveQuery
     */
    public function getInvestor()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * 意向列表数据
     * @param int $userId
     * @param string $no
     * @return $this|mixed
     */
    public static function getIntentionData($userId = 0, $no = '')
    {
        $data = self::find()->alias('i')
            ->leftJoin(Field::tableName() . ' f', 'f.id=i.field.id')
            ->leftJoin(User::tableName() . ' u', 'u.id=i.user_id');
        if (isset($userId) && $userId) {
            $data->where(['user_id' => $userId]);
        }
        if (isset($no) && $no) {
            $data->andWhere(['no' => $no]);
        }
        $data = $data->select(['i.*', 'f.no', 'u.tel'])
            ->page([
                'no' => ['=', 'f.no'],
                'tel' => ['=', 'u.tel'],
                'status' => ['=', 'i.status']
            ]);
        foreach ($data['data'] as $v) {
            $v['status'] = Constant::getFieldStatus($v['status']);
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
            $v['contract_photo'] = explode(',', $v['contract_photo']);
        }
        return $data;
    }
}
