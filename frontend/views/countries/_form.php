<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Countries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="countries-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'country_code')->textInput(['maxlength' => true,   'title' => $model->getAttributeLabel('country_code'),'placeholder' => $model->getAttributeLabel('country_code')])->label(false) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'country_name')->textInput(['maxlength' => true,  'title' => $model->getAttributeLabel('country_name'), 'placeholder' => $model->getAttributeLabel('country_name')])->label(false) ?>
        </div>
        <div class="form-group col-md-12">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
