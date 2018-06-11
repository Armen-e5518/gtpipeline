<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\UsersGrup */

$this->registerCssFile('/css/src.css');
$this->registerCssFile('/main/assets/css/style.css');
$this->registerCssFile('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');

$this->registerJsFile('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
$this->registerJsFile('/main/assets/js/custom.js');
$this->registerJsFile('/js/users/attachments.js');

$this->title = 'Update user group: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users Grups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container-fluid d-flex my-content">
    <?= $this->render('/common/left-menu', ['active' => 'users-group']) ?>
    <div class="wrapper">
        <?= $this->render('/common/top-bar') ?>
        <div class="main m-members ">
            <div class="filter-bar">
                <i id="show-left-slide" class="fa fa-bars"></i>
                <span class="font-14 font-w-300 gray-txt"><?= Html::encode($this->title) ?></span>
            </div>

            <div class="grid-view">
                <?= $this->render('_form', [
                    'model' => $model,
                    'select_users' => $select_users,
                    'users' => $users,
                    'update' => true,
                ]) ?>
            </div>
        </div>
    </div>
</div>
