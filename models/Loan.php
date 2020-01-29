<?php
namespace app\models;

use yii\db\ActiveRecord;

class Loan extends ActiveRecord
{
    public static function tableName()
    {
        return 'loan';
    }

    public function rules()
    {
        return [
            [['user_id', 'amount', 'interest', 'duration', 'start_date', 'end_date', 'campaign', 'status'], 'required'],
            ['user_id', 'integer'],
            ['user_id', 'exist', 'targetClass' => Customer::class, 'targetAttribute' => 'id'],
            [['amount', 'interest'], 'number'],
            ['status', 'integer', 'max' => 1, 'min' => 0],
            ['start_date', 'date', 'format' => 'php:Y-m-d'],
            ['end_date', 'date', 'format' => 'php:Y-m-d']
        ];
    }


    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'user_id']);
    }

}