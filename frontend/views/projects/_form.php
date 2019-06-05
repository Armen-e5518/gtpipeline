<?php

use kartik\date\DatePicker;
use kartik\file\FileInput;
use kartik\widgets\ActiveForm;
use yii\helpers\Html;

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
   <div class="row create-b">
      <br>
      <div class="col-md-6">
         <?= $form->field($model, 'ifi_name')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('ifi_name'), 'placeholder' => 'Fill in the name of entity the contract signed with']) ?>
         <?= $form->field($model, 'client_name')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('client_name'), 'placeholder' => 'Fill in the client name']) ?>
         <?= $form->field($model, 'client_segment')->dropDownList(\frontend\components\DropdownData::client_segment(), ['prompt' => 'Select segment from the dropdown']) ?>
         <?= $form->field($model, 'financed_by')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('financed_by'), 'placeholder' => 'Fill in the name of organization, financing the project']) ?>
         <?= $form->field($model, 'project_name')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('project_name'), 'placeholder' => 'Fill in the full name of the project']) ?>
         <?= $form->field($model, 'project_code')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('project_code'), 'placeholder' => 'Fill in the project code']) ?>
         <div>
            <label class="control-label">Project sectors</label>
            <div class="add-countries">
               <?= \kartik\select2\Select2::widget([
                  'name' => 'project_sectors',
                  'value' => !empty($model->project_sectors) ? explode(',', $model->project_sectors) : [],
                  'data' => \frontend\models\ProjectSectors::getAll(),
                  'maintainOrder' => true,
                  'options' => ['placeholder' => 'Select  from the list', 'id' => 'add-sectors', 'multiple' => true],
                  'pluginOptions' => [
                     'tags' => true,
                  ],
               ]);
               ?>
            </div>
         </div>
         <?= $form->field($model, 'service_line')->dropDownList(\frontend\models\Services::GetServices(), ['prompt' => 'Select services to be provided from the dropdown']) ?>
         <div>
            <label class="control-label">Project components </label>
            <div class="add-countries">
               <?= \kartik\select2\Select2::widget([
                  'name' => 'project_components',
                  'value' => !empty($model->project_components) ? explode(',', $model->project_components) : [],
                  'data' => \frontend\models\Components::GetComponents(),
                  'maintainOrder' => true,
                  'options' => ['placeholder' => 'Select components engaged in the project from the list', 'multiple' => true],
                  'pluginOptions' => [
                     'tags' => true,
                  ],
               ]);
               ?>
            </div>
         </div>
         <?= $form->field($model, 'project_dec')->textarea(['maxlength' => true, 'title' => $model->getAttributeLabel('project_dec'), 'row' => 8, 'placeholder' => 'Briefly describe the project']) ?>
      </div>
      <div class="col-md-6">
         <?= $form->field($model, 'tender_stage')->dropDownList([
            'Proposal' => 'Proposal',
            'Eol' => 'Eol',
            'General procurement notice' => 'General procurement notice',
            'Early intelligence' => 'Early intelligence',
         ], ['prompt' => 'Select from the dropdown']) ?>
         <?= $form->field($model, 'eligibility_restrictions')->dropDownList(['No', 'Yes'], ['prompt' => 'Select from the dropdown'], ['maxlength' => true, 'title' => $model->getAttributeLabel('eligibility_restrictions'), 'placeholder' => $model->getAttributeLabel('eligibility_restrictions')]) ?>
         <div id="id_eligibility_comment" style="display: none">
            <?= $form->field($model, 'eligibility_comment')->textarea(['maxlength' => true, 'title' => $model->getAttributeLabel('eligibility_comment'), 'placeholder' => 'Eligibility comment']) ?>
         </div>
         <?= $form->field($model, 'evaluation_decision_making')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('evaluation_decision_making'), 'placeholder' => 'Fill in the name of entity, responsible for decision making/ evaluation']) ?>
         <?= $form->field($model, 'selection_method')->dropDownList(\frontend\components\DropdownData::selection_method(), ['prompt' => 'Select from the dropdown'], ['maxlength' => true, 'title' => $model->getAttributeLabel('selection_method'), 'placeholder' => $model->getAttributeLabel('selection_method')]) ?>
         <?= $form->field($model, 'required_format')->dropDownList(\frontend\components\DropdownData::required_format(), ['prompt' => 'Select from the dropdown'], ['maxlength' => true, 'title' => $model->getAttributeLabel('required_format'), 'placeholder' => $model->getAttributeLabel('required_format')]) ?>
         <?= $form->field($model, 'required_language')->dropDownList(\frontend\components\DropdownData::required_language(), ['prompt' => 'Select language from the dropdown'], ['maxlength' => true, 'title' => $model->getAttributeLabel('required_language'), 'placeholder' => $model->getAttributeLabel('required_language')]) ?>
         <?= $form->field($model, 'submission_method')->dropDownList(\frontend\components\DropdownData::submission_method(), ['prompt' => 'Select from the dropdown'], ['maxlength' => true, 'title' => $model->getAttributeLabel('submission_method'), 'placeholder' => $model->getAttributeLabel('submission_method')]) ?>
         <?= $form->field($model, 'budget')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('budget'), 'placeholder' => 'Fill in the project budget']) ?>
         <?= $form->field($model, 'duration')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('duration'), 'placeholder' => 'Fill in the estimated project budget']) ?>
         <label class="control-label">Countries</label>
         <div class="add-countries">
            <?= \kartik\select2\Select2::widget([
               'name' => 'countries',
               'value' => $select_countries,
               'data' => $countries,
               'maintainOrder' => true,
               'options' => ['placeholder' => 'Select from the list', 'id' => 'add-country', 'multiple' => true],
               'pluginOptions' => [
                  'tags' => true,
               ],
            ]);
            ?>
         </div>
         <?= $form->field($model, 'location_within_country')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('location_within_country'), 'placeholder' => 'Fill in the project location']) ?>
         <div>
            <label class="control-label">Restriction by user</label>
            <div class="add-countries">
               <?= \kartik\select2\Select2::widget([
                  'name' => 'groups',
                  'value' => $members,
                  'data' => $select_members,
                  'maintainOrder' => true,
                  'options' => ['placeholder' => 'Restriction by user   (Leave empty for public visibility)...', 'id' => 'add-groups', 'multiple' => true],
                  'pluginOptions' => [
                     'tags' => true,
                  ],
               ]);
               ?>
            </div>
         </div>
         <div>
            <label class="control-label">Deadline</label>
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
         </div>
         <br>
         <label class="control-label">Attachments</label>
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
   <br>
   <?php if (!empty($update) && $model->status > 1): ?>
      <div class="row ">

         <div class="col-md-6">
            <div class="step-1">
               <br>
               <h1 align="center">Step 1</h1>
               <?= $form->field($model, 'name_firm')->dropDownList(\frontend\models\Components::GetComponents(), ['prompt' => 'Select from the dropdown']) ?>
               <?= $form->field($model, 'assignment_id')->dropDownList(\yii\helpers\ArrayHelper::map(\frontend\models\Assignments::find()->all(), 'id', 'name'), ['prompt' => 'Select from the dropdown']) ?>
               <?= $form->field($model, 'consultants')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('consultants'), 'placeholder' => 'Fill in the name of partner firm']) ?>
               <?= $form->field($model, 'no_professional_staff')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('no_professional_staff'), 'placeholder' => 'Fill in the staff-months provided by partner firm']) ?>
               <?= $form->field($model, 'staff_months')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('staff_months'), 'placeholder' => 'Fill in the name of partner firm']) ?>
               <?= $form->field($model, 'partner_contact')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('partner_contact'), 'placeholder' => 'Fill in the name and contact']) ?>
               <?= $form->field($model, 'project_value')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('project_value'), 'placeholder' => 'Fill in the currency and fee']) ?>
            </div>
         </div>
         <?php if (!empty($update) && $model->status > 2): ?>
            <div class="col-md-6 ">
               <div class="step-2">
                  <br>
                  <h1 align="center">Step 2</h1>
                  <?= $form->field($model, 'address_client')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('address_client'), 'placeholder' => 'Fill in proposal submission/client address']) ?>
                  <?= $form->field($model, 'duration_assignment')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('duration_assignment'), 'placeholder' => 'Fill in duration of the assignment']) ?>
                  <?= $form->field($model, 'no_provided_staff')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('no_provided_staff'), 'placeholder' => 'Fill in the number of staff involved in the assignment']) ?>
                  <?= $form->field($model, 'narrative_description')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('narrative_description'), 'placeholder' => 'Fill in number of staff-months for the assignment']) ?>
                  <?= $form->field($model, 'services_value')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('services_value'), 'placeholder' => 'Fill in contract fee in USD or Euro']) ?>
                  <?= $form->field($model, 'start_date')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('start_date'), 'placeholder' => 'Fill in year and month for the start of the assignment']) ?>
                  <?= $form->field($model, 'completion_date')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('completion_date'), 'placeholder' => 'Fill in year and month for the completion of the assignment']) ?>
                  <?= $form->field($model, 'name_senior_professional')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('name_senior_professional'), 'placeholder' => 'Indicate most significant profiles such as Project Director/Coordinator, Team Leader']) ?>
                  <?= $form->field($model, 'proportion')->textInput(['maxlength' => true, 'title' => $model->getAttributeLabel('proportion'), 'placeholder' => 'Indicate % of work carried out by your firm']) ?>
                  <?= $form->field($model, 'actual_services_description')->textarea(['maxlength' => true, 'title' => $model->getAttributeLabel('actual_services_description'), 'placeholder' => 'Describe provided services']) ?>
               </div>
            </div>
         <?php endif; ?>
      </div>
   <?php endif; ?>
   <div class="form-group col-md-12" style="margin-top: 20px">
      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success save-form', 'id' => 'save_form']) ?>
   </div>
   <?php ActiveForm::end(); ?>
</div>