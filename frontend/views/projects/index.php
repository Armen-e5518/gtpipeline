<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;

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
                    'name_firm',         //Firm name
                    'client_name',
                    'ifi_name',
                    'project_name',
                    'location_within_country',
                    ['attribute' => 'status',
                        'value' => function ($model) {
                            return $model->GetStatus($model->status);
                        }
                    ],
                    'budget',
                    ['attribute' => 'industry_id',
                        'value' => function ($model) {
                            return $model->GetIndustryById($model->industry_id);
                        }
                    ],
                    ['attribute' => 'service_id',
                        'value' => function ($model) {
                            return $model->GetServiceById($model->service_id);
                        }
                    ],
                    ['attribute' => 'project_value',
                        'value' => function ($model) {
                            return $model->status == 3 ? $model->project_value : '-';
                        },
                    ],
                    'consultants',
                    'lead_partner',
                    'partner_contact',
                    'project_code',

                ];

                $gridColumns = [
                    [
                        'attribute' => '#',
                        'content' => function ($model, $key, $index, $column) {
                            return (int)($index + 1);
                        }
                    ],
                    'name_firm',         //Firm name
                    'client_name',
                    'ifi_name',
                    'project_name',
//                    '',
                    [
                        'attribute' => 'location_within_country',
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
                            'attribute' => 'location_within_country',
                            'data' => \frontend\models\Countries::GetCountries(),
                            'options' => [
                                'placeholder' => 'Countries...',
                            ]
                        ]),
                    ],
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
                    'budget',
                    ['attribute' => 'industry_id',
                        'value' => function ($model) {
                            return $model->GetIndustryById($model->industry_id);
                        },
                        'filter' => \kartik\select2\Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'industry_id',
                            'data' => \frontend\models\Industrys::GetIndustrys(),
                            'options' => [
                                'placeholder' => 'Industries...',
                            ]
                        ]),
                    ],
                    ['attribute' => 'service_id',
                        'value' => function ($model) {
                            return $model->GetServiceById($model->service_id);
                        },
                        'filter' => \kartik\select2\Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'service_id',
                            'data' => \frontend\models\Services::GetServices(),
                            'options' => [
                                'placeholder' => 'Services...',
                            ]
                        ]),
                    ],
                    ['attribute' => 'project_value',
                        'value' => function ($model) {
                            return $model->status == 3 ? $model->project_value : '-';
                        },
                    ],
                    'consultants',
                    'lead_partner',
                    'partner_contact',
                    'project_code',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Actions',
                        'headerOptions' => ['style' => 'color:#337ab7'],
                        'template' => $template,
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a('<i class="fa fa-file-word-o" aria-hidden="true"></i>', $url, [
                                    'title' => Yii::t('app', 'Download word'),
                                ]);
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
                    'exportConfig' =>
                        [
                            ExportMenu::FORMAT_HTML => false,
                            ExportMenu::FORMAT_TEXT => false,
                            ExportMenu::FORMAT_PDF => false,
                        ]

                ]);
//                \yii\widgets\Pjax::begin(['id' => 'medicine']);
                echo \kartik\grid\GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => $gridColumns,
                ]);
//                \yii\widgets\Pjax::end();
                ?>
            </div>
        </div>
    </div>
</div>

