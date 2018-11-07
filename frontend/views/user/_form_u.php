<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user_rules
/* @var $select_countries
 * /* @var $countries
 * /* @var $companies
 * /* @var $select_countries
 * /* @var $model
 * /* @var $model frontend\models\User
 */
/* @var $form yii\widgets\ActiveForm */

?>
<style>
    #user-ebrd{
        display: inherit;
    }
</style>

<div class="user-form">
    <?php $form = ActiveForm::begin([
        'options' => [
            'id' => 'f55'
        ]
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => true,'title' => $model->getAttributeLabel('firstname'), 'placeholder' => $model->getAttributeLabel('firstname')])->label(false) ?>
            <?= $form->field($model, 'lastname')->textInput(['maxlength' => true,'title' => $model->getAttributeLabel('lastname'), 'placeholder' => $model->getAttributeLabel('lastname')])->label(false) ?>
            <?= $form->field($model, 'username')->textInput(['maxlength' => true,'disabled' => 'disabled', 'title' => $model->getAttributeLabel('username'), 'placeholder' => $model->getAttributeLabel('username')])->label(false) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true,'title' => $model->getAttributeLabel('email'), 'placeholder' => $model->getAttributeLabel('email')])->label(false) ?>
            <?= $form->field($model, 'status')->dropDownList(['10' => 'Active', '0' => 'Inactive'],['title' => $model->getAttributeLabel('status')])->label(false); ?>
            <div class="add-rules">
                <?= \kartik\select2\Select2::widget([
                    'name' => 'rules',
                    'value' => $user_rules,
                    'data' => $rules,
                    'maintainOrder' => true,
                    'options' => [
                        'title' => 'Select user rule...',
                        'placeholder' => 'Select user rule...',
                    ],
                    'pluginOptions' => [
                        'tags' => true,
                    ],
                ]);
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <?php if (!empty($model->image_url)): ?>
                <div class="field-user-imagefile attachment gray-bg padding-5 margin-btn-5">
                    <div class="attachment-img">
                        <img width="100px" src="/uploads/<?= $model->image_url ?>" alt="">
                    </div>
                    <i class="fa fa-trash-o delete-user-photo delete-attachment"
                       data-id="<?= $model->id ?>"
                       title="Delete attachment"
                       aria-hidden="true"></i>
                </div>
            <?php endif; ?>
            <?= $form->field($model, 'imageFile')->fileInput() ?>
            <br>
            <div class="add-countries">
                <?= \kartik\select2\Select2::widget([
                    'name' => 'countries',
                    'value' => $select_countries,
                    'data' => $countries,
                    'maintainOrder' => true,
                    'options' => ['placeholder' => 'Countries ...', 'title' => 'Countries...', 'id' => 'add-country', 'multiple' => true],
                    'pluginOptions' => [
                        'tags' => true,
                    ],
                ]);
                ?>
            </div>
            <br>
            <div class="add-companies">
                <?= \kartik\select2\Select2::widget([
                    'name' => 'company_id',
                    'attribute' => 'company_id',
                    'model' => $model,
                    'data' => $companies,
                    'maintainOrder' => true,
                    'options' => [
                        'title' => 'Select firm...',
                        'placeholder' => 'Select firm...',
                    ],
                    'pluginOptions' => [
                        'tags' => true,
                    ],
                ]);
                ?>
            </div>
            <?= $form->field($model, 'ebrd')->checkbox(['maxlength' => true,'title' => $model->getAttributeLabel('ebrd'), 'placeholder' => $model->getAttributeLabel('ebrd')]) ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
