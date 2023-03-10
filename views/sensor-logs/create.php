<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SensorLogs $model */

$this->title = 'Agregar evento';
$this->params['breadcrumbs'][] = ['label' => 'Sensor Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sensor-logs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
