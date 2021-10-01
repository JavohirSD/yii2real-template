<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">

 

    <p>
        <?= "<?= " ?>Html::a(<?='\'<i class="fa fa-fw fa-plus"></i> Create \'' ?>, ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?= $generator->enablePjax ? "    <?php Pjax::begin(); ?>\n" : '' ?>
<?php if(!empty($generator->searchModelClass)): ?>
<?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif; ?>

<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?= " ?>GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => "<div class=\"alert\" style=\"background-color: #bee5eb;\"><text>
                      Sahifa: <b> {page} </b> | Joriy sahifadagi ma'lumotlar soni: <b>
                      {count} </b> | Barcha topilgan ma'lumotlar soni: <b> {totalCount} </b>
                      </text></div>",
        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "'columns' => [\n"; ?>
            ['class'  => 'yii\grid\SerialColumn'],
            [ 'class' => 'yii\grid\CheckboxColumn'],

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "            '" . $name . "',\n";
        } else {
            echo "            //'" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else {
            echo "            //'" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>
    [
        'attribute' => 'status',
        'format' => 'raw',
        'value' =>  function($model){
                $btn  = $model->status==0?'danger':'success';
                $txt  = $model->status==0?'Inaktiv':'Aktiv';
                return '<div class="input-group-prepend">
                    <button type="button" class="btn btn-'.$btn.' dropdown-toggle" data-toggle="dropdown">
                        '.$txt.'
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item text-success" href="/driver/<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>/status?id='.$model->id.'&s=0">Aktiv holatda</a>
                        <a class="dropdown-item text-danger"  href="/driver/<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>/status?id='.$model->id.'&s=1">Aktiv emas</a>
                    </div>
                </div>';
              },
          ],

          ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function ($url) {
                        return Html::a('<div class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></div>',$url, ['title' => 'Delete', 'data-pjax' => '0',]);
                    },
                    'update' => function ($url) {
                        return Html::a('<div class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span></div>',$url, ['title' => 'Update', 'data-pjax' => '0',]);
                    },
                    'view' => function ($url) {
                        return Html::a('<div class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></div>',$url, ['title' => 'View', 'data-pjax' => '0',]);
                    },
                ],
            ],
        ],
    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>

<?= $generator->enablePjax ? "    <?php Pjax::end(); ?>\n" : '' ?>

</div>

<?php echo "<?php " ?> $scr = <<<JS
  $( document ).ready(function() {
      var rows = document.getElementsByTagName('table')[0].rows;
      rows[1].cells[1].innerHTML = '<div class="btn btn-danger" id="delete_selected"><div class="glyphicon glyphicon-trash"></div></div>';
         $('#delete_selected').click(function (){
            var keys = $('.grid-view').yiiGridView('getSelectedRows');
            if(keys.length < 1) {alert('O’chirish uchun maydon tanlanmadi !'); return false }
                $.ajax({
                    type: "POST",
                    url: "/driver/<?=Inflector::camel2id(StringHelper::basename($generator->modelClass))?>/remover",
                    data: {ids: keys},
                    success: function(response) {
                        location.reload();
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }); 
       }); 
JS; $this->registerJs($scr); <?php echo "?>" ?>