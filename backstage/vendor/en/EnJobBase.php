<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "en_job".
 *
 * @property string $id
 * @property string $no 职位编码
 * @property string $job 职位名
 * @property string $last 上级
 * @property string $powers 拥有权限
 */
class EnJobBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_job';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last'], 'integer'],
            [['no'], 'string', 'max' => 8],
            [['job'], 'string', 'max' => 30],
            [['powers'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no' => '职位编码',
            'job' => '职位名',
            'last' => '上级',
            'powers' => '拥有权限',
        ];
    }
}
