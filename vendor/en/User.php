<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $tel 用户电话
 * @property string $password 用户密码
 * @property string $money 余额
 * @property string $created 创建时间
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tel'], 'integer'],
            [['password'], 'string', 'max' => 16],
            [['money', 'created'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tel' => '用户电话',
            'password' => '用户密码',
            'money' => '余额',
            'created' => '创建时间',
        ];
    }

    /**
     * 关联合伙人信息表
     * @return \yii\db\ActiveQuery
     */
    public function getIdent()
    {
        return $this->hasOne(Ident::class, ['user_id' => 'id']);
    }


    public static function getCobber($type = false)
    {
        $data = self::find()->alias('u')->leftJoin(Ident::tableName() . ' i', 'u.id=i.user_id');
        if ($type !== false) {
            $data->where(['i.type' => $type]);
        }
        $data = $data->select(['u.tel username', 'u.id'])->asArray()->all();
        return $data;
    }
}
