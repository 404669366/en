<?php

namespace vendor\en;

use vendor\helpers\Constant;
use vendor\helpers\Helper;
use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "{{%electricize}}".
 *
 * @property int $id
 * @property string $no 电桩编号
 * @property int $gunpoint 枪口数量
 * @property string $field_id 场地ID
 * @property int $model_id 型号ID
 * @property int $section_id 区间ID
 * @property int $created 创建时间
 */
class Electricize extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%electricize}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gunpoint', 'field_id', 'model_id', 'section_id'], 'integer'],
            [['no', 'gunpoint', 'field_id', 'model_id', 'section_id'], 'required'],
            [['no'], 'string', 'max' => 20],
            [['no'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no' => '电桩编号',
            'gunpoint' => '枪口数量',
            'field_id' => '场地ID',
            'model_id' => '型号ID',
            'section_id' => '区间ID',
            'created' => '创建时间',
        ];
    }


    /**
     * 获取分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        $data = self::find()->alias('e')
            ->leftJoin(Field::tableName() . ' f', 'e.field_id=f.id')
            ->leftJoin(Model::tableName() . ' m', 'e.model_id=m.id')
            ->leftJoin(SectionType::tableName() . ' s', 'e.section_id=s.id')
            ->select(['e.*', 'f.title', 'm.name mname', 's.name'])
            ->page([
                'no' => ['=', 'e.no'],
                'name' => ['like', 'm.name'],
                'address' => ['like', 'f.title']
            ]);
        return $data;
    }

    /**
     * 获取场地位置
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getField()
    {
        $data = Field::find()->select(['id', 'title'])->asArray()->all();
        return array_column($data, 'title', 'id');
    }

    /**
     * 获取电桩规格
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getModel()
    {
        $data = Model::find()->select(['id', 'name'])->asArray()->all();
        return array_column($data, 'name', 'id');;
    }

    /**
     * 获取电桩收费配置
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getSection()
    {
        $data = SectionType::find()->select(['id', 'name'])->asArray()->all();
        return array_column($data, 'name', 'id');
    }

    /**
     * 获取场地电桩信息
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getFieldInfo($city, $lng, $lat, $parking_fee, $type, $standard)
    {
        $data = self::find()->alias('e')
            ->leftJoin(Field::tableName() . ' f', 'e.field_id =f.id')
            ->leftJoin(Model::tableName() . ' m', 'm.id =e.model_id')
            ->leftJoin(Area::tableName() . ' a', 'a.area_id =f.area_id')
            ->select(['f.title', 'f.no', 'f.lng', 'f.lat', 'e.no as eno'])
            ->where(['a.parent_id' => $city]);
        if ($parking_fee > 0) {
            $data->andWhere(['f.parking_fee' => $parking_fee]);
        }
        if ($type > 0) {
            $data->andWhere(['m.type' => $type]);
        }
        if ($standard > 0) {
            $data->andWhere(['m.standard' => $standard]);
        }
        $data = $data->asArray()->all();
        $arr = [];
        foreach ($data as $v) {
            //          $ele = redis::app()->hGet('',$v['eno']);
//           json_decode($ele,true);
            $ele = ['gun' => 3, 'free' => 3];
            if (!isset($arr[$v['no']])) {
                $v['distance'] = Helper::distance($lat, $lng, $v['lat'], $v['lng']);
                $arr[$v['no']] = ['title' => $v['title'], 'gun' => $ele['gun'], 'free' => $ele['free'], 'distance' => $v['distance'], 'lng' => $v['lng'], 'lat' => $v['lat']];
            } else {
                $arr[$v['no']]['gun'] += $ele['gun'];
                $arr[$v['no']]['free'] += $ele['free'];
            }
        }
        return $arr;
    }

    /**
     * 获取电桩数据
     * @param $no
     * @return array
     */
    public static function getEle($no)
    {
        $data = self::find()->alias('e')
            ->leftJoin(Field::tableName() . ' f', 'f.id=e.field_id')
            ->leftJoin(Model::tableName() . ' m', 'm.id=e.model_id')
            ->select(['e.*', 'm.voltage', 'm.current'])
            ->where(['f.no' => $no])
            ->asArray()->all();
        $gun = 0;
        $free = 0;
        foreach ($data as &$v) {
            //          $ele = redis::app()->hGet('',$v['no']);
//           json_decode($ele,true);
            $ele = ['gun' => 3, 'free' => 3];
            $v['gun'] = $ele['gun'];
            $v['free'] = $ele['free'];
            $now = time() - strtotime('today');
            $one = SectionRule::find()->alias('r')
                ->leftJoin(SectionType::tableName() . ' t', 't.id=r.section_type_id')
                ->leftJoin(Electricize::tableName() . ' e', 'e.section_id=t.id')
                ->select(['r.electrovalence', 'r.service'])
                ->where(['e.id' => $v['id']])
                ->andWhere(['<=', 'r.start', $now])
                ->andWhere(['>', 'r.end', $now])
                ->asArray()->one();
            $v['electrovalence'] = $one['electrovalence'];
            $v['service'] = $one['service'];
            $gun += $v['gun'];
            $free += $v['free'];
        }
        $num = count($data);
        $model = Field::findOne(['no' => $no]);
        return ['data' => $data, 'model' => $model, 'num' => $num, 'gun' => $gun, 'free' => $free];
    }
}
