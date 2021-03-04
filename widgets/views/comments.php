<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['enctype' => 'multipart/form-data'],
]) ?>

<div class="form-group">
    <div class="col-lg-6">
        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'text')->textarea() ?>

        <?= $form->field($model, 'file')->fileInput() ?>

        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<?php ActiveForm::end() ?>