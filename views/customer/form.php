<?php
//use yii\grid\GridView;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container border own-container-radius">
    <a href="<?=Yii::$app->request->referrer ?: Yii::$app->homeUrl?>"><img src="/img/corner.png" class="own-corner"></a>
    <?php
    $form = ActiveForm::begin([
        'id' => 'customer-form',
        'options' => ['class' => 'form-horizontal', 'method' => 'post'],
    ]) ?>

    <?= $form->field($model, 'first_name') ?>
    <?= $form->field($model, 'last_name') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'personal_code') ?>
    <?= $form->field($model, 'phone') ?>
    <?= $form->field($model, 'active') ?>
    <?= $form->field($model, 'dead') ?>
    <?= $form->field($model, 'lang') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end() ?>
</div>
