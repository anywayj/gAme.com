<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $id
 * @property int $date
 * @property double $price
 * @property int $count
 * @property double $amount
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'price', 'count','user_id'], 'required'],
            [['count','user_id'], 'integer'],
            [['price', 'amount'], 'number'],
            ['date', 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'price' => 'Цена',
            'count' => 'Кол-во',
            'amount' => 'Сумма',
            'user_id' => 'Пользователь',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
