<?php

namespace vendor\en;

use vendor\helpers\Constant;
use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "field".
 *
 * @property int $id
 * @property string $no 场地编号
 * @property string $level 场地等级
 * @property string $member_id 专员ID
 * @property string $local_id 场地方ID
 * @property string $cobber_id 合伙人ID
 * @property string $area_id 地域ID
 * @property string $title 场地标题
 * @property string $address 场地位置
 * @property string $lng 经度
 * @property string $lat 纬度
 * @property string $intro 场地介绍信息
 * @property string $image 场地图片
 * @property string $configure_photo 配置单图片
 * @property string $field_photo 场地方合同
 * @property string $prove_photo 场地证明
 * @property string $power_photo 电力证明
 * @property string $field_drawing 施工图纸
 * @property string $transformer_drawing 变压器图纸
 * @property string $budget_photo 预算报表
 * @property string $areas 场地面积
 * @property string $budget 预算总金额
 * @property string $financing_ratio 融资比例
 * @property string $attention 关注量
 * @property string $click 点击量
 * @property string $record_file 备案文件
 * @property string $record_photo 备案图片
 * @property string $remark 备注
 * @property int $type 类型0合伙人发布1专员发布
 * @property int $status 状态状态0初审中1初审通过2初审不通过3二审中4二审通过5二审不通过6备案成功7备案失败8资料有误9三审中10三审通过11三审不通过12四审中13四审通过14四审不通过
 * @property string $created 创建时间
 */
class Field extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'field';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'local_id', 'cobber_id', 'area_id', 'type', 'status', 'created', 'click', 'attention'], 'integer'],
            [['areas', 'financing_ratio'], 'number'],
            [['no'], 'string', 'max' => 20],
            [['level'], 'string', 'max' => 10],
            [['address', 'intro', 'record_file', 'remark'], 'string', 'max' => 255],
            [['lng', 'lat'], 'string', 'max' => 50],
            [['image', 'record_photo', 'configure_photo', 'field_photo', 'prove_photo', 'power_photo', 'field_drawing', 'transformer_drawing', 'budget_photo'], 'string', 'max' => 1000],
            [['budget', 'title'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no' => '场地编号',
            'level' => '场地等级',
            'member_id' => '专员ID',
            'local_id' => '场地方ID',
            'cobber_id' => '合伙人ID',
            'area_id' => '地域ID',
            'title' => '标题',
            'address' => '场地位置',
            'lng' => '经度',
            'lat' => '纬度',
            'intro' => '场地介绍信息',
            'image' => '场地图片',
            'configure_photo' => '配置单图片',
            'field_photo' => '场地方合同',
            'prove_photo' => '场地证明',
            'power_photo' => '电力证明',
            'field_drawing' => '施工图纸',
            'transformer_drawing' => '变压器图纸',
            'budget_photo' => '预算报表',
            'areas' => '场地面积',
            'budget' => '预算总金额',
            'financing_ratio' => '融资比例',
            'attention' => '关注量',
            'click' => '点击量',
            'record_file' => '备案文件',
            'record_photo' => '备案图片',
            'remark' => '备注',
            'type' => '类型0合伙人发布1专员发布',
            'status' => '状态状态0初审中1初审通过2初审不通过3二审中4二审通过5二审不通过6备案成功7备案失败8资料有误9三审中10三审通过11三审不通过12四审中13四审通过14四审不通过',
            'created' => '创建时间',
        ];
    }


    /**
     * 关联普通用户表获取场地方信息
     * @return \yii\db\ActiveQuery
     */
    public function getLocal()
    {
        return $this->hasOne(User::class, ['id' => 'local_id']);
    }

    /**
     * 关联普通用户表获取合伙人信息
     * @return \yii\db\ActiveQuery
     */
    public function getCobber()
    {
        return $this->hasOne(User::class, ['id' => 'cobber_id']);
    }

    /**
     * 关联后台用户表获取专员信息
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
     * 关联意向表
     * @return \yii\db\ActiveQuery
     */
    public function getIntention()
    {
        return $this->hasMany(Intention::class, ['field_id' => 'id']);
    }

    /**
     * 场地分页数据
     * @param array $status
     * @param int $memberId
     * @param int $type
     * @return $this|mixed
     */
    public static function getPageData($status = [], $memberId = 0, $type = 0)
    {
        $data = self::find()->alias('f')
            ->leftJoin(Area::tableName() . ' a', 'f.area_id=a.area_id')
            ->leftJoin(User::tableName() . ' u1', 'f.cobber_id=u1.id')
            ->leftJoin(User::tableName() . ' u2', 'f.local_id=u2.id')
            ->leftJoin(Member::tableName() . ' m', 'f.member_id=m.id');
        if ($type !== false) {
            $data->where(['f.type' => $type]);
        }
        if ($status) {
            $data->andWhere(['f.status' => $status]);
        }
        if ($memberId) {
            $data->andWhere(['f.member_id' => $memberId]);
        }
        $data = $data->select(['f.*', 'u1.tel tel1', 'u2.tel tel2', 'a.full_name', 'm.username'])
            ->page([
                'no' => ['=', 'f.no'],
                'username' => ['like', 'm.username'],
                'tel1' => ['like', 'u1.tel'],
                'tel2' => ['like', 'u2.tel'],
                'status' => ['=', 'f.status'],
                'type' => ['=', 'f.type'],
            ]);
        foreach ($data['data'] as &$v) {
            $v['status'] = Constant::getFieldStatus()[$v['status']];
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
            $v['type'] = Constant::getFieldType()[$v['type']];
        }
        return $data;
    }

    /**
     * 评分列表分页数据
     * @return mixed
     */
    public static function getScorePageData()
    {
        $data = self::find()->alias('f')
            ->leftJoin(Area::tableName() . ' a', 'f.area_id=a.area_id')
            ->leftJoin(User::tableName() . ' u', 'f.local_id=u.id')
            ->leftJoin(Member::tableName() . ' m', 'f.member_id=m.id')
            ->select(['f.*', 'a.full_name', 'u.tel', 'm.username'])
            ->page([
                'no' => ['=', 'f.no'],
                'member' => ['like', 'm.username'],
                'status' => ['=', 'f.status'],
                'type' => ['=', 'f.type'],
            ]);
        foreach ($data['data'] as &$v) {
            $v['status'] = Constant::getFieldStatus()[$v['status']];
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
            $v['type'] = Constant::getFieldType()[$v['type']];
        }
        return $data;
    }


    /**
     * 合伙人抢单
     * @return string
     */
    public static function rob()
    {
        if ($user_id = Yii::$app->user->id) {
            if ($now = redis::app()->lPop('BackendField')) {
                if ($model = self::findOne($now)) {
                    $model->cobber_id = $user_id;
                    $model->status = 1;
                    if ($model->save()) {
                        return '抢单成功';
                    }
                }
                return '系统错误';
            }
            return '动作慢了';
        }
        return '非法操作';
    }

    /**
     * 获取场地数据
     * @param int $type
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getFields($type = 0)
    {
        $map = [
            1 => 'f.created',
            2 => 'f.financing_ratio',
            3 => 'f.attention',
            4 => 'f.click',
        ];
        $data = [];
        if (isset($map[$type])) {
            $data = self::find()->alias('f')
                ->leftJoin(Area::tableName() . ' a', 'a.area_id=f.area_id')
                ->where(['f.status' => Constant::getShowStatus()])
                ->select(['f.*', 'a.full_name'])
                ->orderBy($map[$type] . ' desc')
                ->limit(4)->asArray()->all();
            foreach ($data as &$v) {
                $v['image'] = explode(',', $v['image'])[0];
            }
        }
        return $data;
    }

    /**
     * 获取场地详情
     * @param string $no
     * @return null|static
     */
    public static function getDetailFields($no = '')
    {
        $model = self::findOne(['no' => $no, 'status' => Constant::getShowStatus()]);
        $model->click += 1;
        $model->save();
        return $model;
    }

    /**
     * 前台列表页数据
     * @param array $get
     * @return array
     */
    public static function getFieldData($get = [])
    {
        $map = [
            1 => 'f.created',
            2 => 'f.financing_ratio',
            3 => 'f.attention',
            4 => 'f.click',
            5 => 'f.areas',
            6 => 'f.budget',
        ];
        $data = self::find()->alias('f')
            ->leftJoin(Area::tableName() . ' a', 'a.area_id=f.area_id')
            ->select(['f.*', 'a.full_name'])
            ->where(['f.status' => Constant::getShowStatus()]);
        if (isset($get['search']) && $get['search']) {
            $data->andWhere([
                'or',
                ['like', 'f.title', $get['search']],
                ['like', 'a.full_name', $get['search']],
                ['f.no' => $get['search']],
            ]);
        }
        if (isset($get['type']) && isset($map[$get['type']])) {
            $now = $get['type'];
            $data->orderBy($map[$get['type']] . ' desc');
        } else {
            $now = 1;
            $data->orderBy($map[$now] . ' desc');
        }
        $data = $data->asArray()->all();
        foreach ($data as &$v) {
            $v['image'] = explode(',', $v['image']);
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
        }
        return ['total' => count($data), 'data' => $data, 'now' => $now];
    }

    /**
     * 推荐场地
     * @param int $limit
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getRecommendField($limit = 5)
    {
        $data = self::find()->alias('f')
            ->leftJoin(Area::tableName() . ' a', 'a.area_id=f.area_id')
            ->select(['f.*', 'a.full_name'])
            ->where(['f.status' => Constant::getShowStatus()])
            ->andWhere(['f.level' => ['A', 'B']])
            ->orderBy('RAND()')
            ->limit($limit)
            ->asArray()->all();
        foreach ($data as &$v) {
            $v['image'] = explode(',', $v['image']);
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
        }
        return $data;
    }
}
