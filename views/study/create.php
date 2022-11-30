<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Study $model */

$this->title = 'Create Study';
$this->params['breadcrumbs'][] = ['label' => 'Studies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="study-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
