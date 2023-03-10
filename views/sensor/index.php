<?php

use app\models\Sensor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SensorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sensores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar Sensores', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'nombre',
                //'estado',
                [
                    'attribute' => 'estado',
                    'format' => 'raw',
                    'value' => function ($estado0) {
                        return $estado0->getState($estado0->estado);
               },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sensor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
