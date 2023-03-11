<?php

use app\models\SensorLogs;
use app\models\Sensor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SensorLogsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-logs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id_sensor',
        'evento',
        'fecha_del_evento',
        [
            'attribute' => 'Nombre del sensor',
            'value' => 'sensor.nombre',
        ],
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, SensorLogs $model, $key, $index, $column) {
                return Url::toRoute([$action,
'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
        body{
            background: #1c92d2;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #f2fcfe, #1c92d2);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #f2fcfe, #1c92d2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
    </style>
</head>
<body>
