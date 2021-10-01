<?php
use yii\helpers\Url;
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=\yii\helpers\Url::home()?>" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><?=Yii::$app->request->serverName?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Administrator</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 sidebar-scroll">

            <?php
            // https://fontawesome.com/v5.15/icons?d=gallery&p=2&m=free
            // FAW v5 icons
            echo \hail812\adminlte3\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Menu', 'header' => true],
                    ['label' => 'Asosiy panel', 'icon' => 'cube',  'url' => ['/site/index']],
                    ['label' => 'Yangiliklar',  'icon' => 'newspaper',  'url' => ['/news/index']],
                    ['label' => 'Foydalanuvchilar', 'icon' => 'users',  'url' => ['/user/index']],
                    ['label' => 'SEO Sozlamalar',   'icon' => 'search', 'url' => ['/seo/update?id=1']],
                    ['label' => 'Sayt lug`ati',     'icon' => 'flag',   'url' => ['/site/language']],
                    ['label' => 'Sayt analitikasi', 'icon' => 'chart-line', 'url' => ['/visitors/index']],

                    ['label' => 'Example menu','icon' => 'server', 'url' => ['product/index'], 'items' => [
                        ['label' => 'Submenu name',  'icon' => 'image', 'url' => ['/controller']],
                        ['label' => 'Submenu name',  'icon' => 'image', 'url' => ['/controller']],
                        ['label' => 'Submenu name',  'icon' => 'image', 'url' => ['/controller']],
                        ['label' => 'Submenu name',  'icon' => 'image', 'url' => ['/controller']],
                    ]],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>