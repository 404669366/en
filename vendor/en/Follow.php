<?php

namespace vendor\en;

use vendor\helpers\Constant;
use Yii;

/**
 * This is the model class for table "follow".
 *
 * @property string $id
 * @property string $user_id 用户ID
 * @property string $field_id 场地ID
 * @property string $created
 */
class Follow extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'follow';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'field_id'], 'required'],
            [['user_id', 'field_id', 'created'], 'integer'],
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
            'field_id' => '场地ID',
            'created' => 'Created',
        ];
    }

    /**
     * 返回用户关注场地
     * @param int $user_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getFollow($user_id = 0)
    {
        if ($user_id) {
            $data = self::find()->alias('f1')
                ->leftJoin(Field::tableName() . ' f2', 'f1.field_id=f2.id')
                ->leftJoin(Area::tableName() . ' a', 'f2.area_id=a.area_id')
                ->select(['f1.created', 'f2.no', 'f2.address', 'f2.budget', 'f2.areas', 'f2.title', 'a.full_name', 'f2.image'])
                ->where(['f2.status' => Constant::getShowStatus(), 'f1.user_id' => $user_id])
                ->orderBy('f1.created DESC')
                ->asArray()->all();
            return $data;
        }
        return [];
    }

    /**
     * 是否关注(关注返回false,未关注返回场地模型)
     * @param string $no
     * @return bool|mixed
     */
    public static function notFollow($no = '')
    {
        if ($user_id = Yii::$app->user->id) {
            $one = self::find()->alias('f1')
                ->leftJoin(Field::tableName() . ' f2', 'f1.field_id=f2.id')
                ->where(['f1.user_id' => $user_id, 'f2.no' => $no])
                ->one();
            if (!$one) {
                return Field::findOne(['no' => $no, 'status' => Constant::getShowStatus()]);
            }
        }
        return false;
    }
}
