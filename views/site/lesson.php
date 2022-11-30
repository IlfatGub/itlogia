<?php

use app\models\Study;
use yii\helpers\Url;
use yii\widgets\Pjax;

$study = new Study();
$study->lesson_id = $model->id;
$passed = $study->getLessonStudy();
?>

<?php Pjax::begin(['enablePushState' => false])?>

<h4 class="text-success"><?= $message ? $message : '' ?></h2>

<div class="site-index">
    <div class="body-content mt-4">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="<?= $passed ? 'text-success' : '' ?>">
                    <?= $passed ? $model->name.'(Просмотрен)' : $model->name ?>
                </h2>
                <p><?=$model->description?></p>
                <iframe width="100%" height="500" src="<?=$model->url?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php if(!$passed): ?>
                    <a href="<?= Url::toRoute(['/lesson/passed', 'id' => $model->id]) ?>" class="btn btn-outline-success float-right" id="study_btn" data-id="<?= $model->id ?>"> Урок просмотрен</a>
                <?php endif ?>
                <a href="<?= Url::toRoute(['/site/index']) ?>" class="btn btn-outline-primary" id="study_btn" data-id="<?= $model->id ?>"> Список уроков</a>
            </div>
        </div>
    </div>
</div>
<?php Pjax::end()?>