<?php
//use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\widgets\DetailView;
?>

<div class="container border own-container-radius">
    <a href="<?=Yii::$app->request->referrer ?: Yii::$app->homeUrl?>"><img src="/img/corner.png" class="own-corner"></a>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
             'user_id',
            'amount',
            'interest',
            'duration',
            'start_date',
            'end_date',
            'campaign',
            'status',
        ],
    ]); ?>
</div>