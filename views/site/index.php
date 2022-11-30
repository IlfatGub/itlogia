<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <?php if($active):?>

        <div class="body-content mt-4 mb-4">
            Active
            <hr class="bg-info">
            <div class="row">
            <?php foreach($active as $item){ ?>
                <div class="col-lg-4">
                    <h2><?=$item->name?></h2>
                    <p><?=$item->description?></p>
                    <p><a class="btn btn-outline-secondary" href="<?= Url::toRoute(['site/lesson', 'id' => $item->id]) ?>"> Перейти </a></p>
                </div>
            <?php }  ?>
            </div>
        </div>
    <?php endif ?>


    <?php if($passed):?>
        <div class="body-content mt-4 text-muted">
            Просмотренные уроки
            <hr>
            <div class="row">
            <?php foreach($passed as $item){ ?>
                <div class="col-lg-4">
                    <h2><?=$item->name?></h2>
                    <p><?=$item->description?></p>
                    <p><a class="btn btn-outline-secondary" href="<?= Url::toRoute(['site/lesson', 'id' => $item->id]) ?>"> Перейти </a></p>
                </div>
            <?php }  ?>
            </div>
        </div>
    <?php endif ?>

</div>
