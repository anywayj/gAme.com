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

    <div class="container">
        <?php /* Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])*/ ?>
        <?= Alert::widget() ?>
        <div class="col-lg-3">

                <?php // if (\Yii::$app->user->can('admin', ['author_id' => $model->user_id])): ?>
                <?php if (\Yii::$app->user->can('admin')): ?>
                            <div class="list-group">
                                <a href="/admin/default/index" class="list-group-item active">
                                    <span class="glyphicon glyphicon-star"></span> Управление
                                </a>
                                <a href="/admin/user/index" class="list-group-item">
                                    <span class="glyphicon glyphicon-user"></span> Пользователи
                                </a>

                                <a href="/admin/resourse/index" class="list-group-item">
                                    <span class="glyphicon glyphicon-plus"></span> Игровые ресурсы 
                                </a>
                            </div>  
  
                <?php else: ?>
                    <?php echo ("Логин: " . \Yii::$app->user->identity->username . ". Нет доступа") ?>
                <?php endif; ?>  


        </div> 
        <div class="col-lg-9"><?= $content ?></div>  
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
