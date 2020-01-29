<?php
//use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="container border own-container-radius">
    <a href="<?=Yii::$app->request->referrer ?: Yii::$app->homeUrl?>"><img src="/img/corner.png" class="own-corner"></a>
    <?= yii\grid\GridView::widget([
        'tableOptions' => ['class' => 'table'],
        'dataProvider' => $dataProvider,
        'filterModel' => $models,
        'columns' => [
            'id',
            [
                'attribute' => 'user_id',
                'value' => function(\app\models\Loan $loan) {
                    if (empty($loan->customer)) {
                        return ' - ';
                    }
                    return $loan->customer->getFullName();
                }
            ],
            'amount',
            'interest',
            'duration',
            'start_date',
            'end_date',
            'campaign',
            'status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>


</div>


<div class="container mb-3">
    <div class="row">
        <ul class="nav own-bottom-buttons">
            <li class="mr-1">
                <div class="own-parent-btn-warning">
                    <?= \yii\helpers\Html::a('Create Loan', ['create'], ['class' => 'own-btn-warning own-btn-warning-bk']) ?>
                </div>
            </li>
        </ul>
    </div>
</div>