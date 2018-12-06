<?php

namespace vendor\en;

use vendor\helpers\Constant;

/**
 * This is the model class for table "{{%intention}}".
 *
 * @property int $id
 * @property string $user_id 投资方ID
 * @property int $field_id 场地ID
 * @property int $no 意向编号
 * @property string $money 预购金额
 * @property string $contract_photo 投资合同
 * @property string $money_audit 转账凭证
 * @property string $ratio 分成比例
 * @property string $remark 备注
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
            [['user_id', 'field_id', 'money'], 'required'],
            [['money', 'ratio'], 'number'],
            [['user_id', 'field_id', 'created'], 'integer'],
            [['remark'], 'string', 'max' => 255],
            [['contract_photo', 'money_audit'], 'string', 'max' => 1000],
            [['no'], 'string', 'max' => 20],
            [['no'], 'validateIntention'],
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
            'user_id' => '投资方ID',
            'field_id' => '场地ID',
            'money' => '预购金额',
            'contract_photo' => '投资合同',
            'money_audit' => '转账凭证',
            'ratio' => '分成比例',
            'remark' => '备注',
            'created' => '创建时间',
        ];
    }

    /**
     * 自定义验证规则
     * @return bool
     */
    public function validateIntention()
    {
        if ($this->status == 2) {
            if (!$this->money) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('money', '请填写融资金额');
                return false;
            }
            if (!$this->ratio || $this->ratio > 1) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('ratio', '请填写正确的分成比例(大于0,小于等于1)');
                return false;
            }
            if (!$this->contract_photo) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('contract_photo', '请添加投资合同');
                return false;
            }
            if (!$this->money_audit) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('money_audit', '请添加转账凭证');
                return false;
            }
        }
        return true;
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
     * 关联场地表
     * @return \yii\db\ActiveQuery
     */
    public function getField()
    {
        return $this->hasOne(Field::class, ['id' => 'field_id']);
    }

    /**
     * 意向列表数据
     * @return mixed
     */
    public static function getPageData()
    {
        $data = self::find()->alias('i')
            ->leftJoin(Field::tableName() . ' f', 'f.id=i.field_id')
            ->leftJoin(User::tableName() . ' u', 'u.id=i.user_id')
            ->select(['i.*', 'f.no field_no', 'u.tel'])
            ->page([
                'no' => ['=', 'f.no'],
                'tel' => ['=', 'u.tel'],
                'status' => ['=', 'i.status']
            ]);
        foreach ($data['data'] as &$v) {
            $v['status'] = Constant::getIntentionStatus()[$v['status']];
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
        }
        return $data;
    }

    /**
     * 更新场地融资比例
     * @return mixed
     */
    public function updateRatio()
    {
        $sum = self::find()->where(['field_id' => $this->field_id])
            ->andWhere([
                'or',
                ['status' => 3],
                ['id' => $this->id]
            ])
            ->select(['sum(money) money'])->asArray()->one();
        $sum = $sum['money'] ? $sum['money'] : 0;
        $model = $this->field;
        $model->financing_ratio = round($sum / $model->budget, 4);

        if ($model->financing_ratio >= Constant::getFieldNode()) {
            $model->status = 18;
        }
        $re = $model->save();
        if (!$re) {
            $this->addError('money', '更新场地融资比例出错');
        }
        return $re;
    }

    /**
     * 我的意向数据
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getIntentionData()
    {
        if ($user_id = \Yii::$app->user->id) {
            $data = self::find()->alias('i')
                ->leftJoin(Field::tableName() . ' f', 'f.id=i.field_id')
                ->select(['i.*', 'f.no field_no'])
                ->where(['i.user_id' => $user_id])
                ->asArray()->all();
            return $data;
        }
        return [];
    }

    /**
     * 返回意向管理数据
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getIntentionManage()
    {
        if ($user_id = \Yii::$app->user->id) {
            $data = self::find()->alias('i')
                ->leftJoin(Field::tableName() . ' f', 'f.id=i.field_id')
                ->select(['i.*', 'f.no field_no'])
                ->where(['f.cobber_id' => $user_id, 'i.status' => [0, 2, 3, 4]])
                ->orderBy('i.created DESC')
                ->asArray()->all();
            return $data;
        }
        return [];
    }
}
