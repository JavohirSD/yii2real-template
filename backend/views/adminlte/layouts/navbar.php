<?php

use yii\helpers\Html;

?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="fullscreen" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <?= Html::a('<i class="nav-icon fas fa-sign-out-alt"> Chiqish</i>',
            ['/site/logout'],
            [
              'data-method' => 'post',
              'class' => 'btn btn-block btn-outline-danger float-right'
            ]) ?>

    </ul>
</nav>

<?php
$scr = <<<JS
   $( document ).ready(function() {
            var size = 0;
            var elem = document.documentElement;
            $("#fullscreen").click(function(){
            if(size === 0) {
                openFullscreen(); 
                size = 1;
              } else {
                 closeFullscreen(); size = 0
               }
            });
       
            function openFullscreen() {
              if (elem.requestFullscreen) {
                elem.requestFullscreen();
              } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
              } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
              }
            }

            function closeFullscreen() {
              if (document.exitFullscreen) {
                document.exitFullscreen();
              } else if (document.webkitExitFullscreen) { /* Safari */
                document.webkitExitFullscreen();
              } else if (document.msExitFullscreen) { /* IE11 */
                document.msExitFullscreen();
              }
            }
        }); 
JS;
$this->registerJs($scr);
?>
