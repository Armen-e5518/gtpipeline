<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\ComponentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerCssFile('/css/src.css');
$this->registerCssFile('/main/assets/css/style.css');
$this->registerCssFile('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');

$this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js');
$this->registerJsFile('/main/assets/js/custom.js');



$this->title = 'Components';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid d-flex my-content">
   <?= $this->render('/common/left-menu', ['active' => 'components']) ?>
   <div class="wrapper">
      <?= $this->render('/common/top-bar') ?>
      <div class="main m-members">
         <div class="filter-bar d-flex">
            <i id="show-left-slide" class="fa fa-bars"></i>
            <span class="font-14 font-w-300 gray-txt"><?= Html::encode($this->title) ?></span>
            <div class="btn-right">
               <?= Html::a('Create components', ['create'], ['class' => 'btn btn-primary']) ?>
            </div>
         </div>
         <div>
            <?= GridView::widget([
               'dataProvider' => $dataProvider,
               'filterModel' => $searchModel,
               'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

//                  'id',
                  'name',

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




