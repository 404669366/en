<?php

namespace vendor\en;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "en_member".
 *
 * @property string $id
 * @property string $username 用户名
 * @property string $tel 手机号
 * @property string $password 密码
 * @property string $job_id 职位id
 * @property int $status 状态 1启用 2禁用 3删除
 * @property string $created_at
 */
class EnMemberBase extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'tel'], 'unique'],
            [['job_id', 'status', 'created_at'], 'integer'],
            [['username'], 'string', 'max' => 30],
            [['tel'], 'string', 'max' => 11],
            [['password'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'tel' => '手机号',
            'password' => '密码',
            'job_id' => '职位id',
            'status' => '状态 1启用 2禁用 3删除',
            'created_at' => 'Created At',
        ];
    }

    /**
     * 用户名或手机号登录
     * @param string $account
     * @param string $pwd
     * @return bool
     */
    public static function accountLogin($account = '', $pwd = '')
    {
        $member = self::findOne(['username' => $account]);
        if (!$member) {
            $member = self::findOne(['tel' => $account]);
        }
        if ($member) {
            if (Yii::$app->security->validatePassword($pwd, $member->password)) {
                Yii::$app->user->login($member);
                return true;
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
