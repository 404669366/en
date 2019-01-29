<?php

namespace vendor\en;

use vendor\helpers\Constant;
use vendor\helpers\Msg;
use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "{{%basis_field}}".
 *
 * @property int $id
 * @property string $user_id 用户ID
 * @property string $area_id 地域ID
 * @property string $member_id 后台用户ID
 * @property string $address 场地位置
 * @property string $intro 场地信息介绍
 * @property string $remark 审核备注
 * @property string $status 场地状态0待认领1已认领2已确认3放弃
 * @property string $created 创建时间
 * @property string $updated 更新时间
 */
class BasisField extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%basis_field}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'area_id', 'member_id', 'status', 'created', 'updated'], 'integer'],
            [['address', 'remark'], 'string', 'max' => 255],
            [['intro'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户ID',
            'area_id' => '地域ID',
            'member_id' => '后台用户ID',
            'address' => '场地位置',
            'intro' => '场地信息介绍',
            'remark' => '审核备注',
            'status' => '场地状态0待认领1已认领2已确认3放弃',
            'created' => '创建时间',
            'updated' => '更新时间',
        ];
    }

    /**
     * 关联普通用户表
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * 关联后台用户表
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::class, ['id' => 'member_id']);
    }

    /**
     * 关联地域表
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::class, ['area_id' => 'area_id']);
    }

    /**
     * 分页数据
     * @param int $memberId
     * @return $this|mixed
     */
    public static function getPageData($memberId = 0)
    {
        $data = self::find()->alias('b')
            ->leftJoin(Area::tableName() . ' a', 'b.area_id=a.area_id')
            ->leftJoin(User::tableName() . ' u', 'b.user_id=u.id')
            ->leftJoin(Member::tableName() . ' m', 'b.member_id=m.id');
        if ($memberId) {
            $data->where(['<>', 'b.status', 3]);
            $data->andWhere(['b.member_id' => $memberId]);
        }
        $data = $data->select(['b.*', 'u.tel', 'a.full_name', 'm.username'])
            ->page([
                'username' => ['like', 'm.username'],
                'tel' => ['like', 'u.tel'],
                'status' => ['=', 'b.status'],
            ]);
        foreach ($data['data'] as &$v) {
            $v['status'] = Constant::getbasisStatus()[$v['status']];
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
        }
        return $data;
    }

    /**
     * 获取场地数量
     * @return int
     */
    public static function getNum()
    {
        return redis::app()->lLen('BackendBasisField');
    }

    /**
     * 专员抢单
     */
    public static function rob()
    {
        Msg::set('非法操作');
        if ($member_id = Yii::$app->user->id) {
            Msg::set('动作慢了');
            if ($now = redis::app()->lPop('BackendBasisField')) {
                Msg::set('系统错误');
                if ($model = self::findOne($now)) {
                    $model->member_id = $member_id;
                    $model->status = 1;
                    $model->updated = time();
                    if ($model->save()) {
                        Msg::set('抢单成功');
                    } else {
                        Msg::set($model->errors());
                    }
                }
            }
        }
    }

    /**
     * 获取基础场地
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getBasisData()
    {
        if ($user = Yii::$app->user->id) {
            $data = self::find()->alias('b')
                ->leftJoin(Area::tableName() . ' a', 'a.area_id=b.area_id')
                ->select(['a.full_name', 'b.address', 'b.created'])->orderBy('b.created DESC')
                ->where(['b.user_id' => $user])->asArray()->all();
            return $data;
        }
        return [];
    }
}
