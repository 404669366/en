<?php

namespace vendor\en;

use vendor\helpers\Constant;
use Yii;

/**
 * This is the model class for table "en_power".
 *
 * @property string $id
 * @property string $no 权限标识
 * @property int $type 权限类型 1菜单2按钮3接口
 * @property string $name 权限名
 * @property string $url 权限路由
 * @property int $sort 排序
 * @property int $last 上级权限
 */
class EnPowerBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_power';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'sort', 'last'], 'integer'],
            [['no'], 'string', 'max' => 8],
            [['name'], 'string', 'max' => 30],
            [['url'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no' => '权限标识',
            'type' => '权限类型 1菜单2按钮3接口',
            'name' => '权限名',
            'url' => '权限路由',
            'sort' => '排序',
            'last' => '上级权限',
        ];
    }

    /**
     * 分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        $data = self::find()->alias('p1')
            ->leftJoin(self::tableName() . ' p2', 'p1.last=p2.id')
            ->select(['p1.*', 'p2.name as lastName'])
            ->page([
                'type' => ['like', 'p1.type'],
                'name' => ['like', 'p1.name'],
                'last' => ['like', 'p2.name'],
            ]);
        foreach ($data['data'] as &$v) {
            $v['type'] = Constant::powerType()[$v['type']];
        }
        return $data;
    }

    /**
     * 返回顶级权限
     * @return array
     */
    public static function getTopPowers($notSelf = false)
    {
        $data = self::find()->where(['last' => 0]);
        if ($notSelf) {
            $data->andWhere(['<>', 'id', $notSelf]);
        }
        return $data->select(['name', 'id'])->asArray()->all();
    }

    /**
     * 返回权限树
     * @return array
     */
    public static function getPowerTree()
    {
        $data = [];
        $tops = self::getTopPowers();
        foreach ($tops as $v) {
            $one['key'] = $v['name'];
            $one['value'] = $v['id'];
            $one['son'] = self::find()->where(['last' => $v['id']])
                ->select(['name as key', 'id as value'])
                ->asArray()->all();
            array_push($data, $one);
        }
        return $data;
    }
}
