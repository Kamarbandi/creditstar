<?php
//use yii\grid\GridView;
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="container border own-container-radius">
    <a href="<?=Yii::$app->request->referrer ?: Yii::$app->homeUrl?>"><img src="/img/corner.png" class="own-corner"></a>
    <?php
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
    ]) ?>

    <?= Html::errorSummary($model) ?>

    <?= $form->field($model, 'user_id')->dropDownList(\app\models\Customer::getList()) ?>
    <?= $form->field($model, 'amount') ?>
    <?= $form->field($model, 'interest') ?>
    <?= $form->field($model, 'duration') ?>
    <?= $form->field($model, 'start_date') ?>
    <?= $form->field($model, 'end_date') ?>
    <?= $form->field($model, 'campaign') ?>
    <?= $form->field($model, 'status') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>