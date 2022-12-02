<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

<?php if(Yii::$app->user->can('admin')) :?>
    <div class="mt-5">
    AdminPanel
    <hr>
        <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/lesson']) ?>"> Уроки </a>
        <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/user']) ?>"> Пользователи </a>
        
        <div class="mt-5"> RBAC</span>
        <hr>
        <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/rbac/assignment']) ?>"> Rbac User </a>
        <a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/rbac/role']) ?>"> Rbac Role</a>
    </div>
<?php else: ?>
    <?php if(!$active):?>
        <h2 class="alert alert-success text-center">Поздравляем! Вы полностью прошли обучение!</h2>
    <?php endif ?>

    <?php if($all):?>
        <div class="body-content mt-4 mb-4">
            Уроки 
            <hr class="bg-info">
            <div class="row">
            <?php foreach($all as $item){ ?>
                <div class="col-lg-4">
                    <h2>
                        <?=$item->name?>
                        <?php if( in_array( $item->id ,$passed ) ) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                            </svg>
                        <?php } ?>
                    </h2>
                    <p><?= $item->_description?></p>
                    <p><a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/site/lesson', 'id' => $item->id]) ?>"> Перейти </a></p>
                    <hr>
                </div>
            <?php }  ?>
            </div>
        </div>
    <?php else: ?>
        <h2 class="alert alert-success text-center">Вы полностью прошли обучение!</h2>
    <?php endif ?>
<?php endif ?>
</div>