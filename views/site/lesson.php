<?php

use app\models\Study;
use yii\helpers\Url;
use yii\widgets\Pjax;

$study = new Study();
$study->lesson_id = $model->id;
$passed = $study->getLessonStudy();
?>

<?php Pjax::begin(['enablePushState' => false])?>

<div class="site-index">
    <div class="body-content mt-4">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="<?= $passed ? 'alert-success' : '' ?>">
                    <?= $passed ? $model->name.'(Просмотрен)' : $model->name ?>
                </h2>
                <p><?=$model->description?></p>
                <iframe width="100%" height="315"
                    src="https://youtu.be/20Ap1kH8wuU">
                </iframe>
                <?php if(!$passed): ?>
                    <a href="<?= Url::toRoute(['/lesson/passed', 'id' => $model->id]) ?>" class="btn btn-outline-secondary" id="study_btn" data-id="<?= $model->id ?>"> Урок просмотрен</a>
                <?php endif ?>

            </div>
        </div>
    </div>
</div>
<?php Pjax::end()?>
