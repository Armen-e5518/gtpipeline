<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\UsersGrupSearcr */
/* @var $data frontend\models\UsersGrupes */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerCssFile('/css/src.css');
$this->registerCssFile('/main/assets/css/style.css');
$this->registerCssFile('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');

$this->registerJsFile('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
$this->registerJsFile('/main/assets/js/custom.js');

$this->title = 'User groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid d-flex my-content">
    <?= $this->render('/common/left-menu', ['active' => 'user-groups']) ?>
    <div class="wrapper">
        <?= $this->render('/common/top-bar') ?>
        <div class="main m-members">
            <div class="filter-bar d-flex">
                <i id="show-left-slide" class="fa fa-bars"></i>
                <span class="font-14 font-w-300 gray-txt"><?= Html::encode($this->title) ?></span>
                <div class="btn-right">
                    <?= Html::a('Create new group', ['users-grup/create'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'name',
                        [
                            'attribute' => 'Users',
                            'format' => 'html',
                            'value' => function ($data) {
                                $s = '<ul>';
                                $users = $data->GetUsersByGroupId(($data->id));
                                foreach ($users as $r) {
                                    $s .= '<li>' . $r . '</li>';
                                }
                                $s .= '</ul>';
                                return $s;
                            },
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
                                    return Html::a('<i class="fa fa-user-plus" aria-hidden="true"></i>', $url, [
                                        'title' => Yii::t('app', 'Add users'),
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

