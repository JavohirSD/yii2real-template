<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
AppAsset::register($this);
$seo = \backend\models\Seo::findOne(['id'=>1,'status'=>1]);
if(\backend\models\Visitors::findOne(['ip_address'=>Yii::$app->request->getUserIP()])['status'] === 0) die();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$seo['title_'.Yii::$app->language]?></title>

    <link rel="shortcut icon" href="/uploads/<?=$seo['icon']?>" type="<?php echo mime_content_type(Yii::getAlias('@frontend')."/web/uploads/".$seo['icon'])?>"/>
    <link rel="icon" type="image/png" sizes="32x32" href="/uploads/<?=$seo['icon']?>">

    <link rel="apple-touch-icon" sizes="72x72"   href="/uploads/<?=$seo['icon']?>"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/uploads/<?=$seo['icon']?>"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/uploads/<?=$seo['icon']?>">

    <meta name="description" content="<?=$seo['description_'.Yii::$app->language]?>"/>
    <meta name="keywords"    content="<?=$seo['keywords']?>"/>
    <meta name="author"      content="<?=$seo['author']?>"/>
    <meta name="copyright"   content="(c)">
    <meta http-equiv="Reply-to" content="<?=$seo['reply_email']?>">
    <meta name="robots" content="index,follow">
    <meta name="google-site-verification" content="<?=$seo['google_verify']?>" />

    <meta property="host_ip" content="<?=Yii::$app->request->getUserIP()?>">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?=$seo['google_analytics'];?>

<?=$seo['yandex_metrika'];?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>









