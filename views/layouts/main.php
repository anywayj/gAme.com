<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index'], 'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Adminka', 'url' => ['/admin/default/index'], 'visible' => Yii::$app->user->can('canAdmin')],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
<?php if(!Yii::$app->user->isGuest): ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
        <br>
            <div class="list-group">
                <a class="list-group-item active">
                <?php $user = Yii::$app->user->identity->recordusers; ?>
                    
                <?php if($user->avatarimage): ?>
                   <img src="/web/uploads/<?= $user->avatarimage ?>" width="20%" height="20%" alt="фото"/>
                <?php else: ?>
                   <img src="/web/uploads/owl.video.play.png" width="20%" height="20%" alt="но-фото"/> 
                <?php endif; ?>


                <b style="padding-left:10px"><?= $user->firstname.' '.$user->lastname ?></b>   
                </a>
           
                <a href="<?= \yii\helpers\Url::to(['site/profile', 'id' => Yii::$app->user->identity->id])?>" class="list-group-item">
                    <span class="fa fa-list-alt"></span> Редактировать данные
                </a>

                <a href="<?= \yii\helpers\Url::to(['site/image', 'id' => Yii::$app->user->identity->id])?>" class="list-group-item">
                    <span class="fa fa-list-alt"></span> Аватарка
                </a>
             
                <a href="/resourse/index" class="list-group-item">
                    <span class="fa fa-list-alt"></span> Ресурсы
                </a>
                <a href="/site/payments" class="list-group-item">
                    <span class="fa fa-list-alt"></span> Платежи
                </a>

            </div>  
        </div>
    
        <div class="col-lg-9">
            <?= $content ?>
       </div>
    </div>
</div>
<?php else: ?>
    <div class="container">
        <?= $content ?>
    </div>
<?php endif; ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
