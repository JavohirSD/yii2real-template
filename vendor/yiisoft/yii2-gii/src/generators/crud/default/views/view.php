<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">

    

    <p>
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Delete') ?>, ['delete', <?= $urlParams ?>], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= "<?= " ?>DetailView::widget([
        'model' => $model,
        'attributes' => [
            <?php if($generator->hasImage()){ ?>
            [
                'attribute' => 'image',
                'format'    => 'raw',
                'value' =>  function($model){
                    $image = $model->image??'holder.png';
                    return "<a href='/uploads/".$image."' target='_blank'>
                           <img src='/uploads/".$image."' width='200'></a>";
                },
            ],
<?php }
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if($name=='status' || $name=='image') continue;
        echo "            '" . $name . "',\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
        if($column->name=='status') continue;
        $format = $generator->generateColumnFormat($column);
        echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
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
        ],
    ]) ?>

</div>
