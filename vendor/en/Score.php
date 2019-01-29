<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "score".
 *
 * @property string $id
 * @property string $num 分数
 * @property string $intro 说明
 * @property string $field_id 场地ID
 * @property string $member_id 评分人员ID
 * @property string $created
 */
class Score extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'score';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num', 'field_id', 'member_id', 'created'], 'required'],
            [['field_id', 'member_id', 'created'], 'integer'],
            [['num'], 'integer', 'max' => 100, 'min' => 0],
            [['intro'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => '分数',
            'intro' => '说明',
            'field_id' => '场地ID',
            'member_id' => '评分人员ID',
            'created' => 'Created',
        ];
    }

    /**
     * 是否评分完成
     * @param int $field_id
     * @return bool
     */
    public static function isEnough($field_id = 0)
    {
        return self::find()->where(['field_id' => $field_id])->count() == Power::getMemberCountByPower('ejmusbj5') ? true : false;
    }

    /**
     * 计算场地等级及通过状态
     * @param int $field_id
     * @return array
     */
    public static function average($field_id = 0)
    {
        $avg = self::find()->where(['field_id' => $field_id])->average('num');
        $level = Grade::find()->where(['>', 'max', $avg])->andWhere(['<=', 'min', $avg])->select(['name'])->asArray()->one();
        $min = Grade::find()->select(['min(min) min'])->one();
        $minName = Grade::findOne(['min' => $min->min])->name;
        return [
            'level' => $level['name'],
            'isPass' => $minName == $level['name'] ? 2 : 1
        ];
    }

    /**
     * 评分后操作
     */
    public function scoreDo()
    {
        if (self::isEnough($this->field_id)) {
            $re = self::average($this->field_id);
            if ($model = Field::findOne($this->field_id)) {
                $model->level = $re['level'];
                $model->status = $re['isPass'];
                $model->save();
            }
        }
    }

    /**
     * 返回场地评分信息
     * @param int $field_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getScore($field_id = 0)
    {
        return self::find()->where(['field_id' => $field_id])->select(['num', 'intro'])->asArray()->all();
    }
}
