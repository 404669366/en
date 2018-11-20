<?php

namespace vendor\en;

use vendor\helpers\Constant;
use Yii;

/**
 * This is the model class for table "{{%basis_field}}".
 *
 * @property int $id
 * @property string $user_id 用户ID
 * @property string $area_id 地域ID
 * @property string $member_id 后台用户ID
 * @property string $name 场地人姓名
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
            [['user_id', 'area_id', 'member_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['address', 'remark', 'created', 'updated'], 'string', 'max' => 255],
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
            'name' => '场地人姓名',
            'address' => '场地位置',
            'intro' => '场地信息介绍',
            'remark' => '审核备注',
            'status' => '场地状态0待认领1已认领2已确认3放弃',
            'created' => '创建时间',
            'updated' => '更新时间',
        ];
    }

    /**
     * 业务员分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        if ($member_id = Yii::$app->user->id) {
            $data = self::find()->alias('b')
                ->leftJoin(Area::tableName() . ' a', 'b.area_id=a.area_id')
                ->leftJoin(User::tableName() . ' u', 'b.user_id=u.id')
                ->where(['b.member_id' => $member_id])
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
     * 管理员分页数据
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
                'name' => ['like', 'b.name'],
                'tel' => ['like', 'u.tel'],
                'status' => ['=', 'b.status'],
            ]);
        foreach ($data['data'] as &$v) {
            $v['status'] = Constant::basisStatus()[$v['status']];
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
            $v['updated'] = date('Y-m-d H:i:s', $v['updated']);
        }
        return $data;
    }
}
