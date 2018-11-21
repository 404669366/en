<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "{{%field}}".
 *
 * @property int $id
 * @property string $area_id 地域ID
 * @property string $user_id 场地方ID
 * @property string $salesman_id 合伙人/业务员ID
 * @property string $address 场地位置
 * @property string $intro 场地介绍信息
 * @property string $image 场地图片
 * @property string $name 场地方真实姓名
 * @property int $status 状态
 * @property int $type 类型1前台2后台
 * @property string $invest_photo 投资方合同
 * @property string $field_photo 场地方合同
 * @property string $prove_photo 场地证明
 * @property string $power_photo 电力证明
 * @property string $file 备案文件
 * @property string $created 创建时间
 */
class Field extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%field}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['area_id', 'user_id', 'salesman_id', 'status', 'type', 'created'], 'integer'],
            [['address', 'intro', 'file'], 'string', 'max' => 255],
            [['image', 'invest_photo', 'field_photo', 'prove_photo', 'power_photo'], 'string', 'max' => 1000],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'area_id' => '地域ID',
            'user_id' => '场地方ID',
            'salesman_id' => '合伙人/业务员ID',
            'address' => '场地位置',
            'intro' => '场地介绍信息',
            'image' => '场地图片',
            'name' => '投资人姓名',
            'status' => '状态',
            'type' => '类型1前台2后台',
            'invest_photo' => '投资方合同',
            'field_photo' => '场地方合同',
            'prove_photo' => '场地证明',
            'power_photo' => '电力证明',
            'file' => '备案文件',
            'created' => '创建时间',
        ];
    }
    /**
     * 业务员分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        if ($salesman_id = Yii::$app->user->id) {
            $data = self::find()->alias('b')
                ->leftJoin(Area::tableName() . ' a', 'b.area_id=a.area_id')
                ->leftJoin(User::tableName() . ' u', 'b.user_id=u.id')
                ->where(['b.member_id' => $salesman_id])
                ->select(['b.*', 'u.tel', 'a.full_name'])
                ->page([
                    'name' => ['like', 'b.name'],
                    'tel' => ['like', 'u.tel'],
                    'status' => ['=', 'b.status'],
                ]);
            foreach ($data['data'] as &$v) {
                $v['status'] = Constant::basisStatus()[$v['status']];
                $v['created'] = date('Y-m-d H:i:s', $v['created']);
            }
            return $data;
        }
        return ['total' => 0, 'data' => []];
    }

    /**
     * 主管分页数据
     * @return mixed
     */
    public static function getAdminPageData()
    {
        $data = self::find()->alias('b')
            ->leftJoin(Area::tableName() . ' a', 'b.area_id=a.area_id')
            ->leftJoin(User::tableName() . ' u', 'b.user_id=u.id')
            ->leftJoin(Member::tableName() . ' m', 'b.member_id=m.id')
            ->select(['b.*', 'u.tel', 'a.full_name', 'm.username'])
            ->page([
                'username' => ['like', 'm.username'],
                'status' => ['=', 'b.status'],
            ]);
        foreach ($data['data'] as &$v) {
            $v['status'] = Constant::basisStatus()[$v['status']];
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
        }
        return $data;
    }
}
