<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UsersGrup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-grup-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php if (!empty($update)): ?>

        <div class="add-countries">
            <?= \kartik\select2\Select2::widget([
                'name' => 'users',
                'value' => $select_users,
                'data' => $users,
                'maintainOrder' => true,
                'options' => ['placeholder' => 'Users ...', 'id' => 'add-country', 'multiple' => true],
                'pluginOptions' => [
                    'tags' => true,
                ],
            ]);
            ?>
        </div>

    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
