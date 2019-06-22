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
 * @property string $field_ratio 场地分成比例
 * @property string $prove_photo 场地证明
 * @property string $power_photo 电力证明
 * @property string $field_drawing 施工图纸
 * @property string $transformer_drawing 变压器图纸
 * @property string $budget_photo 预算报表
 * @property string $park 规划车位
 * @property string $budget 预算总金额
 * @property string $financing_ratio 融资比例
 * @property string $minimal 最低投资金额
 * @property string $attention 关注量
 * @property string $click 点击量
 * @property string $record_file 备案文件
 * @property string $record_photo 备案图片
 * @property string $remark 备注
 * @property int $parking_fee 停车费0无停车费1有停车费
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
            [['member_id', 'local_id', 'cobber_id', 'area_id', 'type', 'status', 'created', 'click', 'attention', 'park'], 'integer'],
            [['financing_ratio', 'field_ratio', 'budget', 'minimal'], 'number'],
            [['no'], 'string', 'max' => 20],
            [['no'], 'required'],
            [['level'], 'string', 'max' => 10],
            [['address', 'intro', 'record_file', 'remark'], 'string', 'max' => 255],
            [['lng', 'lat'], 'string', 'max' => 50],
            [['image', 'record_photo', 'configure_photo', 'field_photo', 'prove_photo', 'power_photo', 'field_drawing', 'transformer_drawing', 'budget_photo'], 'string', 'max' => 1000],
            [['title'], 'string', 'max' => 30],
            [['no'], 'validateField'],
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
            'field_ratio' => '场地分成比例',
            'prove_photo' => '场地证明',
            'power_photo' => '电力证明',
            'field_drawing' => '施工图纸',
            'transformer_drawing' => '变压器图纸',
            'budget_photo' => '预算报表',
            'park' => '规划车位',
            'budget' => '预算总金额',
            'minimal' => '最低投资金额',
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
     * 自定义验证方法
     * @return bool
     */
    public function validateField()
    {
        if ($this->isNewRecord) {
            if (!$this->no) {
                $this->addError('no', '系统错误');
                return false;
            }
            if (!$this->local_id) {
                $this->addError('local_id', '请选择场地方');
                return false;
            }
            if (!$this->area_id) {
                $this->addError('area_id', '请选择地域');
                return false;
            }
            if (!$this->title) {
                $this->addError('title', '请填写标题');
                return false;
            }
            if (!$this->address) {
                $this->addError('address', '请填写详细地址');
                return false;
            }
            if (!$this->intro) {
                $this->addError('intro', '请填写场地描述');
                return false;
            }
            if (!$this->image) {
                $this->addError('image', '请添加场地图片');
                return false;
            }
            if (!$this->lng) {
                $this->addError('lng', '请添加经度');
                return false;
            }
            if (!$this->lat) {
                $this->addError('lat', '请添加纬度');
                return false;
            }
        }
        if ($this->status == 4) {
            if (!$this->configure_photo) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('configure_photo', '请添加配置单图片');
                return false;
            }
            if (!$this->prove_photo) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('prove_photo', '请添加场地证明图片');
                return false;
            }
            if (!$this->field_photo) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('field_photo', '请添加场地合同图片');
                return false;
            }
            if ($this->field_ratio) {
                if ($this->field_ratio > Constant::getFieldMaxRatio()) {
                    $this->status = $this->oldAttributes['status'];
                    $this->addError('field_ratio', '场地分成比例不大于' . Constant::getFieldMaxRatio());
                    return false;
                }
            }
        }
        if ($this->status == 8) {
            if (!$this->record_photo) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('record_photo', '请添加备案图片');
                return false;
            }
            if (!$this->record_file) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('record_file', '请添加备案文件');
                return false;
            }
        }
        if ($this->status == 10) {
            if (!$this->field_drawing) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('field_drawing', '请添加施工图纸');
                return false;
            }
            if (!$this->transformer_drawing) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('transformer_drawing', '请添加变压器图纸');
                return false;
            }
            if (!$this->budget_photo) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('budget_photo', '请添加预算报表');
                return false;
            }
            if (!$this->park) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('park', '请填写规划车位');
                return false;
            }
            if (!$this->budget) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('budget', '请填写预算总金额');
                return false;
            }
        }
        if ($this->status == 11) {
            if (!$this->minimal) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('minimal', '请填写起投金额');
                return false;
            }
            if ($this->minimal > $this->budget) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('minimal', '起投金额不能大于预算总金额');
                return false;
            }
        }
        if ($this->status == 14) {
            if (!$this->power_photo) {
                $this->status = $this->oldAttributes['status'];
                $this->addError('power_photo', '请添加电力证明');
                return false;
            }
        }
        return true;
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
            if (User::isCobber() == 2) {
                if ($now = redis::app()->lPop('BackendField')) {
                    if ($model = self::findOne($now)) {
                        $model->cobber_id = $user_id;
                        if ($model->save()) {
                            return '抢单成功';
                        }
                    }
                    return '系统错误';
                }
                return '动作慢了';
            }
        }
        return '非法操作';
    }

    /**
     * 获取场地数据
     * @param int $type
     * @param int $limit
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getFields($type = 0, $limit = 4)
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
                ->limit($limit)->asArray()->all();
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
        if ($model) {
            $model->click += 1;
            $model->save();
        }
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
            5 => 'f.park',
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
            $data->orderBy($map[$get['type']] . ' desc');
        } else {
            $data->orderBy($map[1] . ' desc');
        }
        $data = $data->asArray()->all();
        foreach ($data as &$v) {
            $v['image'] = explode(',', $v['image']);
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
        }
        return ['total' => count($data), 'data' => $data];
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

    /**
     * 场地跟踪列表
     * @param int $user_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getTrack($user_id = 0)
    {
        if ($user_id) {
            $data = self::find()->alias('f')
                ->leftJoin(Area::tableName() . ' a', 'a.area_id=f.area_id')
                ->where(['f.status' => [0, 1, 2, 4, 5, 6, 8, 9, 10, 11, 12, 14, 15, 18], 'cobber_id' => $user_id])
                ->select(['f.*', 'a.full_name'])
                ->orderBy('f.created DESC')
                ->asArray()->all();
            return $data;
        }
        return [];
    }


    /**
     * 收益预测
     * @param int $power 单位kw
     * @param int $hours 单位小时
     * @return array
     */
    public static function budget($power = 0, $hours = 2)
    {
        $data = [];
        $config = Constant::getBudgetNew();
        $config['dayHours'] = $hours;
        $config['power'] = $power;
        $config['total'] = Univalent::find()->where([
            'and',
            ['>=', 'min', $power],
            ['<', 'max', $power],
        ])->asArray()->one();
        var_dump($config['total']);exit();
        $config['total'] = $config['total'] ? $config['total']['price'] * $power : $config['defPrice'] * $power;
        $transformer = Transformer::find()->where([
            'and',
            ['>=', 'min', $power],
            ['<', 'max', $power],
        ])->asArray()->one();
        $config['transformer'] = $transformer ? $transformer['name'] : '';
        $config['total'] = $transformer ? $config['total'] + $transformer['price'] : $config['total'];
        $config['total'] = $config['total'] / 10000;
        $data['depreciation'] = $config['total'] / 8;
        $data['serviceCharge'][1] = $power * $config['dayHours'] * $config['yearDay'] * $config['servers'] / 10000;
        $data['serviceCharge'][2] = $data['serviceCharge'][1] * pow($config['raiseRatio'] + 1, 1);
        $data['serviceCharge'][3] = $data['serviceCharge'][1] * pow($config['raiseRatio'] + 1, 2);
        $data['serviceCharge'][4] = $data['serviceCharge'][1] * pow($config['raiseRatio'] + 1, 3);
        $data['serviceCharge'][5] = $data['serviceCharge'][4];
        $data['serviceCharge'][6] = $data['serviceCharge'][4];
        $data['serviceCharge'][7] = $data['serviceCharge'][4];
        $data['serviceCharge'][8] = $data['serviceCharge'][4];
        $data['serviceChargeAll'] = array_sum($data['serviceCharge']);
        $data['powerLoss'][1] = $power * $config['dayHours'] * $config['yearDay'] * $config['pLoss'] * $config['price'] * $config['tax'] / (1 - $config['pLoss']) / 10000;
        $data['powerLoss'][2] = $data['powerLoss'][1] * pow($config['raiseRatio'] + 1, 1);
        $data['powerLoss'][3] = $data['powerLoss'][1] * pow($config['raiseRatio'] + 1, 2);
        $data['powerLoss'][4] = $data['powerLoss'][1] * pow($config['raiseRatio'] + 1, 3);
        $data['powerLoss'][5] = $data['powerLoss'][4];
        $data['powerLoss'][6] = $data['powerLoss'][4];
        $data['powerLoss'][7] = $data['powerLoss'][4];
        $data['powerLoss'][8] = $data['powerLoss'][4];
        $data['powerLossAll'] = array_sum($data['powerLoss']);
        $data['fieldCommission'][1] = $data['serviceCharge'][1] * $config['field'];
        $data['fieldCommission'][2] = $data['fieldCommission'][1] * pow($config['raiseRatio'] + 1, 1);
        $data['fieldCommission'][3] = $data['fieldCommission'][1] * pow($config['raiseRatio'] + 1, 2);
        $data['fieldCommission'][4] = $data['fieldCommission'][1] * pow($config['raiseRatio'] + 1, 3);
        $data['fieldCommission'][5] = $data['fieldCommission'][4];
        $data['fieldCommission'][6] = $data['fieldCommission'][4];
        $data['fieldCommission'][7] = $data['fieldCommission'][4];
        $data['fieldCommission'][8] = $data['fieldCommission'][4];
        $data['fieldCommissionAll'] = array_sum($data['fieldCommission']);
        $data['roofCommission'][1] = $data['serviceCharge'][1] * $config['roof'];
        $data['roofCommission'][2] = $data['roofCommission'][1] * pow($config['raiseRatio'] + 1, 1);
        $data['roofCommission'][3] = $data['roofCommission'][1] * pow($config['raiseRatio'] + 1, 2);
        $data['roofCommission'][4] = $data['roofCommission'][1] * pow($config['raiseRatio'] + 1, 3);
        $data['roofCommission'][5] = $data['roofCommission'][4];
        $data['roofCommission'][6] = $data['roofCommission'][4];
        $data['roofCommission'][7] = $data['roofCommission'][4];
        $data['roofCommission'][8] = $data['roofCommission'][4];
        $data['roofCommissionAll'] = array_sum($data['roofCommission']);
        $data['moneyFlow'][1] = $data['serviceCharge'][1] - $data['powerLoss'][1] - $data['fieldCommission'][1] - $data['roofCommission'][1];
        $data['moneyFlow'][2] = $data['serviceCharge'][2] - $data['powerLoss'][2] - $data['fieldCommission'][2] - $data['roofCommission'][2];
        $data['moneyFlow'][3] = $data['serviceCharge'][3] - $data['powerLoss'][3] - $data['fieldCommission'][3] - $data['roofCommission'][3];
        $data['moneyFlow'][4] = $data['serviceCharge'][4] - $data['powerLoss'][4] - $data['fieldCommission'][4] - $data['roofCommission'][4];
        $data['moneyFlow'][5] = $data['moneyFlow'][4];
        $data['moneyFlow'][6] = $data['moneyFlow'][4];
        $data['moneyFlow'][7] = $data['moneyFlow'][4];
        $data['moneyFlow'][8] = $data['moneyFlow'][4];
        $data['moneyFlowAll'] = array_sum($data['moneyFlow']);
        $data['yearProfit'][1] = $data['moneyFlow'][1] - $data['depreciation'];
        $data['yearProfit'][2] = $data['moneyFlow'][2] - $data['depreciation'];
        $data['yearProfit'][3] = $data['moneyFlow'][3] - $data['depreciation'];
        $data['yearProfit'][4] = $data['moneyFlow'][4] - $data['depreciation'];
        $data['yearProfit'][5] = $data['yearProfit'][4];
        $data['yearProfit'][6] = $data['yearProfit'][4];
        $data['yearProfit'][7] = $data['yearProfit'][4];
        $data['yearProfit'][8] = $data['yearProfit'][4];
        $data['yearProfitAll'] = array_sum($data['yearProfit']);
        return ['config' => $config, 'data' => $data];
    }

    /**
     * 获取合伙人场地
     * @param $cobber_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getCobberField($cobber_id)
    {
        $data = User::find()->alias('u')
            ->leftJoin(Field::tableName() . ' f', 'u.id=f.cobber_id')
            ->leftJoin(Ident::tableName() . ' i', 'i.user_id=u.id')
            ->leftJoin(Area::tableName() . ' a', 'a.area_id=f.area_id')
            ->where(['u.id' => $cobber_id, 'i.status' => [1, 4], 'f.status' => Constant::getShowStatus()])
            ->select(['f.no', 'a.full_name', 'f.title', 'f.image', 'f.park', 'f.minimal', 'f.budget', 'u.tel', 'i.name', 'i.address'])
            ->orderBy('f.created DESC')
            ->asArray()->all();
        return $data;
    }
}
