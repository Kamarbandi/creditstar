<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Customer
 * @package app\models
 * @property string $personal_code
 */

class Customer extends ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'lang'], 'string'],
            [['personal_code', 'phone', 'active', 'dead'], 'integer']
        ];
    }

    public function getFullName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }



    /**
     * @return array
     */
    public static function getList(): array
    {
        return \yii\helpers\ArrayHelper::map(
            self::find()->all(), 'id', function (\app\models\Customer $customer) {
                return $customer->getFullName();
            }
        );
    }


    public function getAge(){
        $century = substr($this->personal_code, 0, 1);
        if($century <= 2){
            $century = 18;
        }elseif ($century >= 3 && $century <= 4){
            $century = 19;
        }elseif ($century >= 5 && $century <= 6){
            $century = 20;
        }else{
            $century = 21;
        }

        $year = $century.substr($this->personal_code, 1, 2);
        $day = substr($this->personal_code, 5, 2);
        $month = substr($this->personal_code, 3, 2);
        $birthdate = $day.'.'.$month.'.'.$year;

        $bday = new \DateTime($birthdate); // Your date of birth
        $today = new \Datetime(date('m.d.y'));
        $diff = $today->diff($bday);
//            $age = $diff->y.' years, '.$diff->m.' month, '.$diff->d.' days'; // i removed month and days, because look it not beautiful
        $age = $diff->y;
        return $age;
    }

}