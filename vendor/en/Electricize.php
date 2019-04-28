<?php

namespace vendor\en;

use vendor\helpers\Constant;
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


}
