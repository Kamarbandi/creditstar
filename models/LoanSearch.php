<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\data\Sort;

class LoanSearch extends Loan
{
    public function rules()
    {
        return [
            [['id', 'amount', 'interest'], 'integer'],
            [['start_date', 'end_date'], 'safe']
        ];
    }

    public function search($params)
    {
        $sort = new Sort([
            'attributes' => [
                'id',
                'amount',
                'interest',
                'start_date'=>[
                    'asc' => ['start_date' => SORT_ASC],
                    'desc' => ['start_date' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'Start date'
                ],
                'end_date' => [
                    'asc' => ['end_date' => SORT_ASC],
                    'desc' => ['end_date' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'End date',
                ]
            ],
        ]);

        $this->load($params);

        $query = self::find()
        ->andFilterWhere(['like', 'id', $this->id])
        ->andFilterWhere(['like', 'amount', $this->amount])
        ->andFilterWhere(['like', 'interest', $this->interest])
        ->andFilterWhere(['like', 'end_date', $this->end_date])
        ->andFilterWhere(['like', 'start_date', $this->start_date]);

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