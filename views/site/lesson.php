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
                <h2>
                    <?= $model->name ?>

                    <?php if($passed) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                            </svg>
                        <?php } ?>

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