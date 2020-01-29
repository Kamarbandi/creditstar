<?php

namespace app\controllers;

use app\models\Loan;
use app\models\LoanSearch;
use Yii;
use yii\web\Controller;

class LoanController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'models' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Loan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('form', ['model' => $model]);
    }


    public function actionView(int $id)
    {
        $model = Loan::findOne(['id' => $id]);

        return $this->render('view', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = Loan::findOne(['id' => $id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('form', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        Loan::findOne(['id' => $id])->delete();
        return $this->redirect(['index']);
    }

}
