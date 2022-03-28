<?php
use yii\helpers\Url;
$this->title = '';
//$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150<sup style="font-size: 20px"> ta</sup></h3>
                <p>Maxsulotlar</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-bag"></i>
            </div>
            <a href="<?=Url::base()?>/products" class="small-box-footer">Batafsil... <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px"> ta</sup></h3>

                <p>Buyurtmalar</p>
            </div>
            <div class="icon">
                <i class="fas fa-parachute-box"></i>
            </div>
            <a href="<?=Url::base()?>/orders" class="small-box-footer">Batafsil... <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>44<sup style="font-size: 20px"> ta</sup></h3>

                <p>Murojaatlar</p>
            </div>
            <div class="icon">
                <i class="fas fa-comments"></i>
            </div>
            <a href="<?=Url::base()?>/feedbacks" class="small-box-footer">Batafsil... <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?=\backend\models\Visitors::find()->where(['!=','id',0])->sum('visits')?><sup style="font-size: 20px"> ta</sup></h3>

                <p>Saytga tashriflar</p>
            </div>
            <div class="icon">
                <i class="fas fa-eye"></i>
            </div>
            <a href="<?=Url::base()?>/visitors" class="small-box-footer">Batafsil... <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="/uploads/<?=\common\models\User::findOne(Yii::$app->user->id)['image']?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?=\common\models\User::findOne(Yii::$app->user->id)['username']?></h3>

                            <p class="text-muted text-center">Administrator</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Login: </b> <a class="float-right"><?=\common\models\User::findOne(Yii::$app->user->id)['username']?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email:</b> <a class="float-right"><?=\common\models\User::findOne(Yii::$app->user->id)['email']?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Parol: </b> <a class="float-right">*************</a>
                                </li>
                            </ul>

                            <a href="<?=Url::base()?>/user/update?id=<?=Yii::$app->user->id?>" class="btn btn-primary btn-block"><div class="fa fa-user-edit"></div> <b> Tahrirlash</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Foydalanuvchilar</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
        <!--                        <button type="button" class="btn btn-tool" data-card-widget="remove">-->
        <!--                            <i class="fas fa-times"></i>-->
        <!--                        </button>-->
                            </div>
                        </div>
                        <div class="card-body">
                                <div class="chart">
                                    <canvas id="line-chart" width="800" height="450"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <p><b>Disk hajmi: ( <?=$disk_size?> / <?=$folder_size?> ) </b></p>

                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:<?=$percent_size?>">
                                    <?=$percent_size?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Server ma'lumotlari:</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td width="10"><b>Host: </b></td>
                                    <td><?=Yii::$app->request->hostInfo?></td>
                                </tr>
                                <tr>
                                    <td><b>IP Manzil: </b></td>
                                    <td><?=gethostbyname($_SERVER['SERVER_NAME']);?></td>
                                </tr>
                                <tr>
                                    <td><b>Sana: </b></td>
                                    <td><?=date('d.m.Y')?></td>
                                </tr>
                                <tr>
                                    <td><b>Vaqt: </b></td>
                                    <td id="timer"><?=date('H:i:s')?></td>
                                </tr>

                                <tr>
                                    <td><b>Arxitektura: </b></td>
                                    <td><?php
                                            $output = shell_exec('mysql -V');
                                            preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version);
                                            echo $_SERVER['SERVER_SOFTWARE']."
                                            <br>PHP: ".PHP_VERSION."
                                            <br> MySQL: ".$version[0]; ?>
                                    </td>
                                 </tr>


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
       </div>
   </div>
</section>
<?php
$scr = <<<JS
        $( document ).ready(function() {
            $(".content-header").removeClass();
            startTime();
            function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('timer').innerHTML =
                h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
            }
            function checkTime(i) {
                if (i < 10) {i = "0" + i}  // add zero in front of numbers < 10
                return i;
            }
            
        
         $.ajax
        ({
            type: "GET",
            url: "<?=Url::base()?>/visitors/getstat",
            data: {
            },
            success: function (html) {
                var resp = JSON.parse(JSON.stringify(html));
                var datas = [];
                var dates = [];
            
                function formatDate(date){
                    var dd = date.getDate();
                    var mm = date.getMonth()+1;
                    var yyyy = date.getFullYear();
                    if(dd<10) {dd='0'+dd}
                    if(mm<10) {mm='0'+mm}
                    date = dd+'.'+mm+'.'+yyyy;
                    return date
                 }
                 
                 for (var i=0; i<resp.length; i++){
                        datas[i] = resp[i]['visits'];
                        var d = new Date();
                        d.setDate(d.getDate() - i);
                        dates.push( formatDate(d) )
                 }
                 
             new Chart(document.getElementById("line-chart"), {
                 type: 'line',
                  data: {
                    labels:   dates.reverse(),
                    datasets: [{ 
                        data:  datas,
                        label: "Tashrif buyuruvchilar",
                        borderColor: "#3e95cd",
                        fill: true
                      }
                    ]
                  },
                  options: {
                    title: {
                      display: true,
                      text: 'Saytga tashrif buyuruvchilarning so`ngi 1 haftalik ko`rsatkichi'
                    }
                  }
               });
             }
          });
      }); 
JS;
$this->registerJs($scr);
?>


