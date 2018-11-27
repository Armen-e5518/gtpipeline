<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;

//use kartik\daterange\DateRangePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Projects */
/* @var $members */
/* @var $select_members */
/* @var $select_countries */
/* @var $countries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-form" id="id_project_forms">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'ifi_name')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('ifi_name'), 'placeholder' => $model->getAttributeLabel('ifi_name')])->label(false) ?>
            <?= $form->field($model, 'client_name')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('client_name'), 'placeholder' => $model->getAttributeLabel('client_name')])->label(false) ?>
            <?= $form->field($model, 'project_name')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('project_name'), 'placeholder' => $model->getAttributeLabel('project_name')])->label(false) ?>
            <?= $form->field($model, 'project_dec')->textarea(['maxlength' => true, 'title' => $model->getAttributeLabel('project_dec'), 'row' => 8, 'placeholder' => $model->getAttributeLabel('project_dec')])->label(false) ?>
            <?= $form->field($model, 'tender_stage')->dropDownList([
                    'Proposal' => 'Proposal',
                    'Eol' => 'Eol',
                    'General procurement notice' => 'General procurement notice',
                    'Early intelligence' => 'Early intelligence',
                ]
                , ['prompt' => '']) ?>
            <?= DatePicker::widget([
                'model' => $model,
                'name' => 'request_issued',
                'attribute' => 'request_issued',
                'type' => DatePicker::TYPE_RANGE,
                'name2' => 'deadline',
                'attribute2' => 'deadline',
                'options' => ['placeholder' => 'Request issued'],
                'options2' => ['placeholder' => 'Deadline'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy',
                    'todayBtn' => true,
                    'todayHighlight' => true
                ]
            ]); ?>
            <?= $form->field($model, 'budget')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('budget'), 'placeholder' => $model->getAttributeLabel('budget')])->label(false) ?>
            <?= $form->field($model, 'duration')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('duration'), 'placeholder' => $model->getAttributeLabel('duration')])->label(false) ?>
            <div class="add-countries">
                <?= \kartik\select2\Select2::widget([
                    'name' => 'countries',
                    'value' => $select_countries,
                    'data' => $countries,
                    'maintainOrder' => true,
                    'options' => ['placeholder' => 'Countries ...', 'id' => 'add-country', 'multiple' => true],
                    'pluginOptions' => [
                        'tags' => true,
                    ],
                ]);
                ?>
            </div>
            <?= $form->field($model, 'international_status')->checkbox([])->label(false); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'eligibility_restrictions')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('eligibility_restrictions'), 'placeholder' => $model->getAttributeLabel('eligibility_restrictions')])->label(false) ?>
            <?= $form->field($model, 'selection_method')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('selection_method'), 'placeholder' => $model->getAttributeLabel('selection_method')])->label(false) ?>
            <?= $form->field($model, 'submission_method')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('submission_method'), 'placeholder' => $model->getAttributeLabel('submission_method')])->label(false) ?>
            <?= $form->field($model, 'evaluation_decision_making')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('evaluation_decision_making'), 'placeholder' => $model->getAttributeLabel('evaluation_decision_making')])->label(false) ?>
            <?= $form->field($model, 'beneficiary_stakeholder')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('beneficiary_stakeholder'), 'placeholder' => $model->getAttributeLabel('beneficiary_stakeholder')])->label(false) ?>
            <?= $form->field($model, 'project_code')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('project_code'), 'placeholder' => $model->getAttributeLabel('project_code')])->label(false) ?>
            <?= $form->field($model, 'status')->dropDownList($model::STATUS); ?>
            <div class="add-countries">
                <?= \kartik\select2\Select2::widget([
                    'name' => 'groups',
                    'value' => $select_groups,
                    'data' => $groups,
                    'maintainOrder' => true,
                    'options' => ['placeholder' => 'Restriction by user groups (Leave empty for public visibility)...', 'id' => 'add-groups', 'multiple' => true],
                    'pluginOptions' => [
                        'tags' => true,
                    ],
                ]);
                ?>
            </div>
            <?php // $form->field($model, 'importance_1')->checkbox([])->label(false); ?>
            <?php // $form->field($model, 'importance_2')->checkbox([])->label(false); ?>
            <?php // $form->field($model, 'importance_3')->checkbox()->label(false); ?>
            <!--            <div class="add-members">-->
            <?php
            //                \kartik\select2\Select2::widget([
            //                    'name' => 'members',
            //                    'value' => $select_members,
            //                    'data' => $members,
            //                    'maintainOrder' => true,
            //                    'options' => ['placeholder' => 'Members ...', 'multiple' => true],
            //                    'pluginOptions' => [
            //                        'tags' => true,
            //                    ],
            //                ]);
            ?>
            <!--            </div>-->

            <br>
            <?php if (!empty($attachments)): ?>
                <div class="attachments">
                    <?php foreach ($attachments as $attachment): ?>
                        <div class="attachment gray-bg padding-5 margin-btn-5">
                            <?php if ($attachment['type'] == 'png' || $attachment['type'] == 'jpg'): ?>
                                <div class="attachment-img">
                                    <img src="<?= Yii::$app->params['attachments_url'] . $attachment['src'] ?>" alt="">
                                </div>
                            <?php endif; ?>
                            <a download
                               class="font-14"
                               href="<?= Yii::$app->params['attachments_url'] . $attachment['src'] ?>"><?= $attachment['src'] ?></a>
                            <i class="fa fa-trash-o delete-attachment" data-id="<?= $attachment['id'] ?>"
                               title="Delete attachment"
                               aria-hidden="true"></i>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?= FileInput::widget([
                'model' => $model,
                'name' => 'attachments[]',
                'attribute' => 'attachments[]',
                'options' => [
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'showUpload' => false,
                ]
            ]); ?>
        </div>
    </div>
    <?php if (!empty($update)): ?>
        <div class="row">
            <div class="col-md-6">
                <hr>
                <h1>Step 1</h1>
                <?= $form->field($model, 'project_value')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('project_value'), 'placeholder' => $model->getAttributeLabel('project_value')])->label(false) ?>
                <?= $form->field($model, 'name_firm')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('name_firm'), 'placeholder' => $model->getAttributeLabel('name_firm')])->label(false) ?>
                <?= $form->field($model, 'industry_id')->dropDownList(\yii\helpers\ArrayHelper::map(\frontend\models\Industrys::find()->all(), 'id', 'name'), ['prompt' => '']) ?>
                <?= $form->field($model, 'service_id')->dropDownList(\yii\helpers\ArrayHelper::map(\frontend\models\Services::find()->all(), 'id', 'name'), ['prompt' => '']) ?>
                <?= $form->field($model, 'consultants')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('consultants'), 'placeholder' => $model->getAttributeLabel('consultants')])->label(false) ?>
                <?= $form->field($model, 'lead_partner')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('lead_partner'), 'placeholder' => $model->getAttributeLabel('lead_partner')])->label(false) ?>
                <?= $form->field($model, 'partner_contact')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('partner_contact'), 'placeholder' => $model->getAttributeLabel('partner_contact')])->label(false) ?>
                <?= $form->field($model, 'location_within_country')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('location_within_country'), 'placeholder' => $model->getAttributeLabel('location_within_country')])->label(false) ?>
            </div>
            <div class="col-md-6">
                <hr>
                <h1>Step 2</h1>
                <?= $form->field($model, 'address_client')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('address_client'), 'placeholder' => $model->getAttributeLabel('address_client')])->label(false) ?>
                <?= $form->field($model, 'duration_assignment')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('duration_assignment'), 'placeholder' => $model->getAttributeLabel('duration_assignment')])->label(false) ?>
                <?= $form->field($model, 'staff_months')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('staff_months'), 'placeholder' => $model->getAttributeLabel('staff_months')])->label(false) ?>
                <?= $form->field($model, 'services_value')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('services_value'), 'placeholder' => $model->getAttributeLabel('services_value')])->label(false) ?>
                <?= $form->field($model, 'start_date')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('start_date'), 'placeholder' => $model->getAttributeLabel('start_date')])->label(false) ?>
                <?= $form->field($model, 'completion_date')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('completion_date'), 'placeholder' => $model->getAttributeLabel('completion_date')])->label(false) ?>
                <?= $form->field($model, 'name_senior_professional')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('name_senior_professional'), 'placeholder' => $model->getAttributeLabel('name_senior_professional')])->label(false) ?>
                <?= $form->field($model, 'assignment_id')->dropDownList(\yii\helpers\ArrayHelper::map(\frontend\models\Assignments::find()->all(), 'id', 'name'), ['prompt' => '']) ?>
                <?= $form->field($model, 'proportion')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('proportion'), 'placeholder' => $model->getAttributeLabel('proportion')])->label(false) ?>
                <?= $form->field($model, 'no_professional_staff')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('no_professional_staff'), 'placeholder' => $model->getAttributeLabel('no_professional_staff')])->label(false) ?>
                <?= $form->field($model, 'no_provided_staff')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('no_provided_staff'), 'placeholder' => $model->getAttributeLabel('no_provided_staff')])->label(false) ?>
                <?= $form->field($model, 'narrative_description')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('narrative_description'), 'placeholder' => $model->getAttributeLabel('narrative_description')])->label(false) ?>
                <?= $form->field($model, 'actual_services_description')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('actual_services_description'), 'placeholder' => $model->getAttributeLabel('actual_services_description')])->label(false) ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="form-group col-md-12" style="margin-top: 20px">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success save-form', 'id' => 'save_form']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<script>

</script>