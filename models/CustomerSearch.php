<?php


namespace app\models;

use yii\data\ActiveDataProvider;
use yii\data\Sort;

class CustomerSearch extends Customer
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['first_name', 'last_name', 'email', 'personal_code'], 'safe'],
        ];
    }


    public function search($params)
    {
        $sort = new Sort([
            'attributes' => [
                'id',
                'first_name' => [
                    'asc' => ['first_name' => SORT_ASC],
                    'desc' => ['first_name' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'First name',
                ],
                'last_name' => [
                    'asc' => ['last_name' => SORT_ASC],
                    'desc' => ['last_name' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'Last name',
                ],
                'email'=>[
                    'asc' => ['email' => SORT_ASC],
                    'desc' => ['email' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'E-Mail'
                ],
                'lang',
                'personal_code'
            ],
        ]);

        $this->load($params);
        $query = self::find()
            ->andFilterWhere(['like', 'id',         $this->id])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name',  $this->last_name])
            ->andFilterWhere(['like', 'email',      $this->email])
            ->andFilterWhere(['like', 'personal_code', $this->personal_code]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => $sort
        ]);

        return $dataProvider;
    }


}