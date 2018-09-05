<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resourse".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 * @property int $count
 */
class Resourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resourse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'count','user_id'], 'required'],
            [['count','user_id'], 'integer'],
            [['name', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'icon' => 'Иконка',
            'count' => 'Кол-во',
            'user_id' => 'Пользователь',
        ];
    }

    public function saveImage($filename) {
        $this->icon = $filename;
        return $this->save(false);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}
