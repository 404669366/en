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
 * @property string $cate 用户分类
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
            [['tel', 'cate'], 'integer'],
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
            'cate' => '用户分类',
            'created' => '创建时间',
        ];
    }

    /**
     * 获取合伙人
     * @param int $type
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getCobber($type = 1)
    {
        return User::find()->alias('u')
            ->leftJoin(Ident::tableName() . ' i', 'i.user_id=u.id')
            ->where(['i.type' => $type])
            ->select(['tel username', 'id'])
            ->asArray()->all();
    }
}