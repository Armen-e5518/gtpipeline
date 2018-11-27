<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Documents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6">

                <?= $form->field($model, 'title')->textInput(['maxlength' => true,]); ?>

            <div class="add-countries">
                <label class="control-label" for="documents-category">Category</label>
                <?= \kartik\select2\Select2::widget([
                    'model' => $model,
                    'name' => 'category',
                    'attribute' => 'category',
                    'data' => [
                        'MF profiles' => 'MF profiles',
                        'Credentials' => 'Credentials',
                        'CVs' => 'CVs',
                        'Methodologies' => 'Methodologies',
                        'Expression of interests' => 'Expression of interests',
                        'Proposals' => 'Proposals',
                        'RFPs' => 'RFPs',
                        'Templates' => 'Templates',
                        'Certificates' => 'Certificates',
                        'Other' => 'Other',
                    ],
                    'maintainOrder' => true,
                    'options' => ['placeholder' => 'Category ...', 'id' => 'add-category', 'multiple' => false],
                    'pluginOptions' => [
                        'tags' => true,
                    ],
                ]);
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <label class="control-label" for="documents-category">File</label>
            <?= FileInput::widget([
                'model' => $model,
                'name' => 'file_my',
                'attribute' => 'file_my',
                'options' => [
                    'multiple' => false,
                ],
                'pluginOptions' => [
                    'showUpload' => false,
                ]
            ]); ?>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
