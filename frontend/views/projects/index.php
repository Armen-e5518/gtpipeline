<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;

$this->registerCssFile('/css/src.css');
$this->registerCssFile('/main/assets/css/style.css');
$this->registerCssFile('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js');
$this->registerJsFile('/main/assets/js/custom.js');

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\ProjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->formatter->nullDisplay = '';
$template = (Yii::$app->rule_check->CheckByKay(['super_admin'])) ? "{view}{update}{delete}" : "{view}";
?>
<div class="container-fluid d-flex my-content">
   <?= $this->render('/common/left-menu', ['active' => 'reports']) ?>
   <div class="wrapper">
      <?= $this->render('/common/top-bar') ?>
      <div class="main m-members">

         <div class="filter-bar d-flex" style="position: relative">
            <i id="show-left-slide" class="fa fa-bars"></i>
            <span class="font-14 font-w-300 gray-txt"><?= Html::encode($this->title) ?></span>
            <div class="btn-right" style="
                position: absolute;
                left: 15px;
                top: 50px;">
               <?= Html::a('Reset filters', ['/reports'], ['class' => 'btn btn-success']) ?>
            </div>
         </div>
         <div style="margin-top: 50px">
            <?php
            $gridColumnsMenu = [
               [
                  'attribute' => '#',
                  'content' => function ($model, $key, $index, $column) {
                     return (int)($index + 1);
                  }
               ],

               'ifi_name',
               'client_name',
               'financed_by',
               'project_name',
               [
                  'attribute' => 'country',
                  'label' => 'Country',
                  'format' => 'html',
                  'value' => function ($data) {
                     $s = [];
                     $data = \frontend\models\ProjectCountries::GetCountriesNameByProjectIdAllData($data->id);
                     foreach ($data as $r) {
                        array_push($s, $r);
                     }
                     return implode(',', $s);
                  },
               ],
               'location_within_country',
               'address_client',
               'start_date',
               'completion_date',
               'services_value',
               [
                  'attribute' => 'service_line',
                  'value' => function ($model) {
                     return $model->service_line ? \frontend\models\Services::GetServices()[$model->service_line] : '';
                  },
               ],
               [
                  'attribute' => 'project_sectors',
                  'value' => function ($model) {
                     if ($model->project_sectors) {
                        $date = \frontend\models\ProjectSectors::getAll();
                        $d = explode(',', $model->project_sectors);
                        $value = [];
                        foreach ($d as $v) {
                           array_push($value, $date[$v]);
                        }
                        return implode(',', $value);
                     }
                     return '';
                  },
               ],
               ['attribute' => 'project_components',
                  'value' => function ($model) {
                     return $model->project_components ? \frontend\components\DropdownData::project_components()[$model->project_components] : '';
                  },
               ],
               'duration_assignment',
               'no_provided_staff',
               'narrative_description',
               'consultants',
               'no_professional_staff',
               'name_senior_professional',
               'actual_services_description',
               ['attribute' => 'assignment_id',
                  'value' => function ($model) {
                     return $model->assignment_id ? \yii\helpers\ArrayHelper::map(\frontend\models\Assignments::find()->all(), 'id', 'name')[$model->assignment_id] : '';
                  },
               ],
               'proportion',
               [
                  'attribute' => 'status',
                  'value' => function ($model) {
                     return $model->GetStatus($model->status);
                  },
               ],
            ];

            $gridColumns = [
               ['class' => 'yii\grid\SerialColumn'],
               'ifi_name',
               'client_name',
               'financed_by',
               'project_name',
               [
                  'attribute' => 'country',
                  'label' => 'Country',
                  'format' => 'html',
                  'value' => function ($data) {
                     $s = '<ul>';
                     $data = \frontend\models\ProjectCountries::GetCountriesNameByProjectIdAllData($data->id);
                     foreach ($data as $r) {
                        $s .= '<li>' . $r . '</li>';
                     }
                     $s .= '</ul>';
                     return $s;
                  },
                  'filter' => \kartik\select2\Select2::widget([
                     'model' => $searchModel,
                     'attribute' => 'country',
                     'data' => \frontend\models\Countries::GetCountries(),
                     'options' => [
                        'placeholder' => 'Countries...',
                     ]
                  ]),
               ],
               [
                  'attribute' => 'services_value',
                  'label' => 'Value of the services '
               ],

               ['attribute' => 'service_line',
                  'value' => function ($model) {
                     return $model->service_line ? \frontend\models\Services::GetServices()[$model->service_line] : '';
                  },
                  'filter' => \kartik\select2\Select2::widget([
                     'model' => $searchModel,
                     'attribute' => 'service_line',
                     'data' => \frontend\models\Services::GetServices(),
                     'options' => [
                        'placeholder' => 'Services line...',
                     ]
                  ]),
               ],
               [
                  'attribute' => 'project_sectors',
                  'label' => 'Project sectors',
                  'value' => function ($model) {
                     if ($model->project_sectors) {
                        $date = \frontend\models\ProjectSectors::getAll();
                        $d = explode(',', $model->project_sectors);
                        $value = [];
                        foreach ($d as $v) {
                           array_push($value, $date[$v]);
                        }
                        return implode(',', $value);
                     }
                     return '';
                  },
                  'filter' => \kartik\select2\Select2::widget([
                     'model' => $searchModel,
                     'attribute' => 'project_sectors',
                     'data' => \frontend\models\ProjectSectors::getAll(),
                     'options' => [
                        'placeholder' => 'Project sectors...',
                     ]
                  ]),
               ],
               ['attribute' => 'project_components',
                  'value' => function ($model) {
                     if ($model->project_sectors) {
                        $date = \frontend\models\Components::GetComponents();
                        $d = explode(',', $model->project_components);
                        $value = [];
                        foreach ($d as $v) {
                           array_push($value, $date[$v]);
                        }
                        return implode(',', $value);
                     }
                     return '';
                  },
                  'filter' => \kartik\select2\Select2::widget([
                     'model' => $searchModel,
                     'attribute' => 'project_components',
                     'data' => \frontend\models\Components::GetComponents(),
                     'options' => [
                        'placeholder' => 'Project components..',
                     ]
                  ]),
               ],
               'consultants',
               [
                  'attribute' => 'status',
                  'value' => function ($model) {
                     return $model->GetStatus($model->status);
                  },
                  'filter' => \kartik\select2\Select2::widget([
                     'model' => $searchModel,
                     'attribute' => 'status',
                     'data' => \frontend\models\Projects::STATUS,
                     'options' => [
                        'placeholder' => 'Status...',
                     ]
                  ]),
               ],
               [
                  'class' => 'yii\grid\ActionColumn',
                  'header' => 'Actions',
                  'headerOptions' => ['style' => 'color:#337ab7'],
                  'template' => $template,
                  'buttons' => [
                     'view' => function ($url, $model) {
                        return ($model->status == 3) ? Html::a('<i class="fa fa-file-word-o" aria-hidden="true"></i>', $url, [
                           'title' => Yii::t('app', 'Download word'),
                        ]) : false;
                     },
                     'update' => function ($url, $model) {
                        return Html::a('<i class="fa fa-pencil" aria-hidden="true"></i>', $url, [
                           'title' => Yii::t('app', 'Update'),
                        ]);
                     },
                     'delete' => function ($url, $model) {
                        return Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i>', $url, [
                           'title' => Yii::t('app', 'Delete'),
                        ]);
                     }
                  ],
               ],
            ];
            echo ExportMenu::widget([
               'dataProvider' => $dataProvider,
               'columns' => $gridColumnsMenu,
               'target' => ExportMenu::TARGET_SELF,
               'filename' => 'Report',
               'exportConfig' =>
                  [
                     ExportMenu::FORMAT_HTML => false,
                     ExportMenu::FORMAT_TEXT => false,
                     ExportMenu::FORMAT_PDF => false,
                     ExportMenu::FORMAT_CSV => false,
                     ExportMenu::FORMAT_EXCEL => true,
                  ]

            ]);
            echo \kartik\grid\GridView::widget([
               'dataProvider' => $dataProvider,
               'filterModel' => $searchModel,
               'columns' => $gridColumns,
            ]);
            ?>
         </div>
      </div>
   </div>
</div>

