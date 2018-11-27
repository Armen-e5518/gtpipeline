<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $members
 * */

$this->registerCssFile('/css/src.css');
$this->registerCssFile('/main/assets/css/style.css');
$this->registerCssFile('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');
//$this->registerCssFile('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css');
//$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js');
//$this->registerJsFile('//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js');
//$this->registerJsFile('/js/members/src.js');

$this->registerJsFile('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
$this->registerJsFile('/main/assets/js/custom.js');

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container-fluid d-flex my-content">
    <?= $this->render('/common/left-menu', ['active' => 'members']) ?>
    <div class="wrapper">
        <?= $this->render('/common/top-bar') ?>
        <div class="main m-members">
            <div class="filter-bar d-flex">
                <i id="show-left-slide" class="fa fa-bars"></i>
                <span class="font-14 font-w-300 gray-txt"><?= Html::encode($this->title) ?></span>
                <div class="btn-right">
                    <?= Html::a('Reset', ['index'], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Create user', ['create'], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Create group', ['users-grup/create'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'firstname',
                        'lastname',
                        'email:email',
                        'username',
                        [
                            'attribute' => 'Role',
                            'format' => 'html',
                            'value' => function ($data) {
                                $s = '<ul>';
                                $user_rules = \frontend\models\UserRules::GetUserRulesNamesByUserId($data->id);
                                foreach ($user_rules as $r) {
                                    $s .= '<li>' . $r . '</li>';
                                }
                                $s .= '</ul>';
                                return $s;
                            },
                            'filter' => \kartik\select2\Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'rule_id',
                                'data' => [
                                    1 => 'Super Admin',
                                    2 => 'Moderator'
                                ],
                                'options' => [
                                    'placeholder' => 'Role...',
                                ]
                            ]),
                        ],
                        [
                            'attribute' => 'Country',
                            'format' => 'html',
                            'value' => function ($data) {
                                $s = '<ul>';
                                $countries = $data->GetCountriesByUserId(($data->id));
                                foreach ($countries as $r) {
                                    $s .= '<li>' . $r . '</li>';
                                }
                                $s .= '</ul>';
                                return $s;
                            },
                            'filter' => \kartik\select2\Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'country_id',
                                'data' => \frontend\models\Countries::GetCountries(),
                                'options' => [
                                    'placeholder' => 'Countries...',
                                ]
                            ]),
                        ],
//                        'Propasal','Eol','General procurement notice','Early intelligence'
                        [
                            'attribute' => 'Firm',
                            'format' => 'html',
                            'value' => function ($data) {
                                $company = $data->GetCompany(($data->company_id));
                                return "<span>{$company}</span>";
                            },
                            'filter' => \kartik\select2\Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'company_id',
                                'data' => \frontend\models\Companies::GetCompanies(),
                                'options' => [
                                    'placeholder' => 'Companies...',
                                ]
                            ]),
                        ],
                        [
                            'attribute' => 'ebrd',
                            'format' => 'html',
                            'value' => function ($data) {
                                return ($data->ebrd == 1) ? "<span  style='color:#00adc7;'>Yes</span>" : "No";
                            },
                            'filter' => \kartik\select2\Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'ebrd',
                                'data' => [
                                    0 => 'No',
                                    1 => 'Yes'
                                ],
                                'options' => [
                                    'placeholder' => 'Ebrd...',
                                ]
                            ]),
                        ],
                        [
                            'attribute' => 'image_url',
                            'format' => 'html',
                            'value' => function ($data) {
                                $img = !empty($data->image_url) ? $data->image_url : 'no-user.png';
                                return Html::img('/uploads/' . $img,
                                    ['width' => '50px']);
                            },
                        ],
                        [
                            'attribute' => 'Status',
                            'format' => 'html',
                            'value' => function ($data) {
                                return ($data->status == 10) ? "<span  style='color:#00adc7;'>Active</span>" : "Inactive";
                            },
                            'filter' => \kartik\select2\Select2::widget([
                                'model' => $searchModel,
                                'attribute' => 'status',
                                'data' => [
                                    0 => 'Inactive',
                                    10 => 'Active'
                                ],
                                'options' => [
                                    'placeholder' => 'Status...',
                                ]
                            ]),
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Actions',
                            'headerOptions' => ['style' => 'color:#337ab7'],
                            'template' => '{update}{delete}',
                            'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::a('<i class="fa fa-eye" aria-hidden="true"></i>', $url, [
                                        'title' => Yii::t('app', 'lead-view'),
                                    ]);
                                },
                                'update' => function ($url, $model) {
                                    return Html::a('<i class="fa fa-pencil" aria-hidden="true"></i>', $url, [
                                        'title' => Yii::t('app', 'lead-update'),
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    return Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i>', $url, [
                                        'title' => Yii::t('app', 'Delete'),
                                        'aria-label' => 'Delete',
                                        'data-pjax' => '0',
                                        'data-confirm' => 'Are you sure you want to delete this item?',
                                        'data-method' => 'post',
                                    ]);
                                }
                            ],
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
