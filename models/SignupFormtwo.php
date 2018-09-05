<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
 
/**
 * Signup form
 */
class SignupFormtwo extends Model
{
 
    public $firstname;
    public $lastname;
   


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname','lastname'], 'trim'],
            [['firstname','lastname'], 'required'],
            [['firstname','lastname'], 'string', 'min' => 3, 'max' => 255],
           
            
        ];
    }


    public function attributeLabels()
    {
        return [
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
        ];
    }
	
	
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

    public function signuptwo()
    {
 
        if (!$this->validate()) {
            return null;
        }
 
        $user1 = new RecordUser();
        $user1->firstname = $this->firstname;
        $user1->lastname = $this->lastname;
       
        return $user1->save() ? $user1 : null;
    }
 
}