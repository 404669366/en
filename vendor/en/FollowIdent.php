<?php

namespace vendor\en;

/**
 * This is the model class for table "{{%follow_ident}}".
 *
 * @property string $id
 * @property string $user_id 用户ID
 * @property string $cobber_id 合伙人ID
 * @property string $created
 */
class FollowIdent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%follow_ident}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'cobber_id', 'created'], 'integer'],
            [['user_id', 'cobber_id'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户ID',
            'cobber_id' => '合伙人ID',
            'created' => 'Created',
        ];
    }

    /**
     * 查询是否关注合伙人
     * @param $cobber_id
     * @param $user_id
     * @return null|static
     */
    public static function getFollowIdent($cobber_id, $user_id)
    {
        $one = self::findOne(['user_id' => $user_id, 'cobber_id' => $cobber_id]);
        return $one;
    }

    /**
     * 获取用户关注的合伙人
     * @param $user_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getFollow($user_id)
    {
        $follow = self::find()->alias('f')
            ->leftJoin(Ident::tableName() . ' i', 'i.user_id=f.user_id')
            ->leftJoin(User::tableName() . ' u', 'f.user_id=u.id')
            ->where(['f.user_id'=>$user_id])
            ->select(['i.name', 'u.tel', 'f.created','f.cobber_id'])
            ->asArray()->all();
        return $follow;
    }
}
