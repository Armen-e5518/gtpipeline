<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->registerCssFile('/css/src.css');
$this->registerCssFile('/main/assets/css/style.css');
$this->registerCssFile('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js');
$this->registerJsFile('/main/assets/js/custom.js');

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\DocumentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documents';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container-fluid d-flex my-content">
    <?= $this->render('/common/left-menu', ['active' => 'documents']) ?>
    <div class="wrapper">
        <?= $this->render('/common/top-bar') ?>
        <div class="main m-members">

            <div class="filter-bar d-flex">
                <i id="show-left-slide" class="fa fa-bars"></i>
                <span class="font-14 font-w-300 gray-txt"><?= Html::encode($this->title) ?></span>
                <div class="btn-right">

                    <?= Html::a('Upload new file', ['create'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//                        'id',
                        ['attribute' => 'url',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::a( '<i class="fa fa-cloud-download" aria-hidden="true"></i> ' . $model->url , ['/documents/' . $model->url ], ['target' => '_blank']);
                            },
                        ],
                        [
                            'attribute' => 'type',
                            'format' => 'html',
                            'value' => function ($model) {
                                switch ($model->type) {
                                    case   'pdf':
                                        return '<span class="fa fa-file-pdf-o"></span> (PDF) ';
                                    case   'doc':
                                        return '<span class="fa fa-file-word-o"></span> (DOC)';
                                    case   'docx':
                                        return '<span class="fa fa-file-word-o"></span> (DOCX)';
                                    case   'txt':
                                        return '<span class="fa fa-file-text-o"></span> (TXT)';
                                    case   'xlsx':
                                        return '<span class="fa fa-file-excel-o"></span> (XLSX)';
                                    case   'xls':
                                        return '<span class="fa fa-file-excel-o"></span> (XLS)';
                                    default:
                                        return '<span class="fa fa-file"></span> ';
                                }
                            },
                        ],
                        'category',
                        'date',
                        // 'user_id',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Actions',
                            'headerOptions' => ['style' => 'color:#337ab7'],
                            'template' => '{update}{delete}',
                            'buttons' => [
                                'update' => function ($url, $model) {
                                    return Html::a('<i class="fa fa-pencil" aria-hidden="true"></i>', $url, [
                                        'title' => Yii::t('app', 'Update'),
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
