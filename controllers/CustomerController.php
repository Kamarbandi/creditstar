<?php

namespace app\controllers;

use app\models\Customer;
use app\models\CustomerSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CustomerController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'models' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionCreate()
    {
        $model = new Customer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('form', ['model' => $model]);
    }


    public function actionView(int $id)
    {
        $model = Customer::findOne(['id' => $id]);

        return $this->render('view', ['model' => $model]);
    }


    public function actionUpdate($id)
    {
        $model = Customer::findOne(['id' => $id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('form', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        Customer::findOne(['id' => $id])->delete();
        return $this->redirect(['index']);
    }

    /**
     * @param int $id
     * @return Customer
     * @throws NotFoundHttpException
     */
    protected function load(int $id): Customer
    {
        $customer = Customer::findOne($id);
        if (empty($customer)) {
            throw new NotFoundHttpException();
        }
        return $customer;
    }
}
