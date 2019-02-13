<?php

namespace vendor\en;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $tel 用户电话
 * @property string $password 用户密码
 * @property string $money 余额
 * @property string $wechat 微信ID
 * @property string $created 创建时间
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
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
            [['tel'], 'unique', 'message' => '手机号已注册'],
            [['tel', 'created'], 'integer'],
            [['wechat'], 'unique'],
            [['password', 'wechat'], 'string', 'max' => 80],
            [['money'], 'string', 'max' => 255],
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
            'wechat' => '微信ID',
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


    /**
     * 获取合伙人
     * @param bool $type
     * @return $this|array|\yii\db\ActiveRecord[]
     */
    public static function getCobber($type = false)
    {
        $data = self::find()->alias('u')->leftJoin(Ident::tableName() . ' i', 'u.id=i.user_id');
        if ($type !== false) {
            $data->where(['i.type' => $type, 'i.status' => [1, 3, 4, 5]]);
        } else {
            $data->where(['i.type' => [1, 2], 'i.status' => [1, 3, 4, 5]]);
        }
        $data = $data->select(['u.tel', 'u.id'])->asArray()->all();
        return $data;
    }

    /**
     * 是否合伙人
     * @return bool|mixed
     */
    public static function isCobber()
    {
        if ($user_id = Yii::$app->user->id) {
            if ($model = Ident::findOne(['user_id' => $user_id, 'status' => [1, 3, 4, 5]])) {
                if (in_array($model->type, [1, 2])) {
                    return $model->type;
                }
            }
        }
        return false;
    }

    //todo**********************  登录接口实现  ***************************

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['password' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->password;
    }

    public function validateAuthKey($authKey)
    {
        return $this->password === $authKey;
    }

}
