<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form ">

    <?php $form = ActiveForm::begin([
        'options' => [
            'autocomplete' => 'off'
        ],
    ]); ?>
    <div class="row">


        <div class="col-md-6">

            <?= $form->field($model, 'firstname')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('firstname'), 'id' => 'u_first_name', 'placeholder' => $model->getAttributeLabel('firstname')])->label(false) ?>

            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('lastname'),'id' => 'u_last_name', 'placeholder' => $model->getAttributeLabel('lastname')])->label(false) ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true,'title' => $model->getAttributeLabel('username'), 'autocomplete'=>"off", 'id' => 'u_name', 'placeholder' => $model->getAttributeLabel('username')])->label(false) ?>

            <div class="add-countries">
                <?= \kartik\select2\Select2::widget([
                    'name' => 'groups',
                    'value' => [],
                    'data' => $groups,
                    'maintainOrder' => true,
                    'options' => ['placeholder' => 'Groups ...', 'id' => 'add-country', 'multiple' => true],
                    'pluginOptions' => [
                        'tags' => true,
                    ],
                ]);
                ?>
            </div>

        </div>
        <div class="col-md-6">

            <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true,'title' => $model->getAttributeLabel('password_hash'), 'autocomplete'=>"off", 'placeholder' => $model->getAttributeLabel('password_hash')])->label(false) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true,'title' => $model->getAttributeLabel('email'), 'placeholder' => $model->getAttributeLabel('email')])->label(false) ?>

            <?= $form->field($model, 'status')->dropDownList(['10' => 'Active', '0' => 'Inactive'])->label(false); ?>

        </div>
    </div>

    <div class="form-group">
        <br>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>