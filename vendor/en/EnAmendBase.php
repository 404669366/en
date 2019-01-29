<?php

namespace vendor\en;

use vendor\helpers\Constant;
use Yii;

/**
 * This is the model class for table "en_amend".
 *
 * @property string $id
 * @property string $name 用户名
 * @property string $tel 电话号码
 * @property int $type 业务类型
 * @property int $status 状态 1待跟踪2已联系3已处理4删除
 * @property string $remark 备注
 * @property int $created_at
 * @property int $contact_at 联系时间
 */
class EnAmendBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_amend';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tel', 'type', 'name'], 'required'],
            [['tel', 'name'], 'unique', 'message' => '您已经联系过啦'],
            [['type', 'status', 'created_at', 'contact_at'], 'integer'],
            [['name'], 'string', 'max' => 10],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '用户名',
            'tel' => '手机号',
            'type' => '业务类型',
            'status' => '状态',
            'remark' => '备注',
            'created_at' => '创建时间',
            'contact_at' => '联系时间',
        ];
    }

    /**
     * 分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        $types = EnServeBase::getReceptionServes();
        $data = self::find()
            ->where(['<>', 'status', 4])
            ->page([
                'name' => ['like', 'name'],
                'tel' => ['like', 'tel'],
                'status' => ['=', 'status'],
                'type' => ['=', 'type'],
                'created_at' => ['=', 'FROM_UNIXTIME(created_at,"%Y-%m-%d")'
                ],
            ]);
        foreach ($data['data'] as &$v) {
            $v['type'] = $types[$v['type']];
            $v['transStatus'] = Constant::amendStatus()[$v['status']];
            $v['created_at'] = date('Y-m-d H:i:s', $v['created_at']);
            $v['contact_at'] = $v['contact_at'] ? date('Y-m-d H:i:s', $v['contact_at']) : '----';
        }
        return $data;
    }
}



