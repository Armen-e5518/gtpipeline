<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
$this->registerCssFile('/main/assets/css/login.css');
$this->title = $name;
?>



<div class="container">
   <div class="logo" style="background-color: #00adc7">
      <a href="/">
         <img src="/main/assets/images/logo.png"
              alt="Grant Thornton | An instinct for growth&trade;"
              title="Grant Thornton | An instinct for growth&trade;">
      </a>
   </div>
   <div class="access-area">
      <h1 style="color:#512178;">Pipeline Management System</h1>
      <div class="access-form">
         <div class="site-error">

            <h1 style="color: #512178"><?= Html::encode($this->title) ?></h1>

            <div class="alert alert-danger">
               <?= nl2br(Html::encode($message)) ?>
            </div>

            <p>
               The above error occurred while the Web server was processing your request.
            </p>
            <p>
               Please contact us if you think this is a server error. Thank you.
            </p>

         </div>
   </div>
</div>

