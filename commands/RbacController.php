<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\User;
/**
 * Инициализатор RBAC выполняется в консоли php yii my-rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {
        $auth = Yii::$app->authManager;
        $user = new User();

        $user->username = 'admin';
        $user->email = 'admin@itlogia.ru';
        $user->password = 'admin';
        $adm = $user->userCreate();
        
        $user->username = 'user1';
        $user->email = 'user1@itlogia.ru';
        $user->password = '123123';
        $user = $user->userCreate();

        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...
        
        // Создадим роли админа и редактора новостей
        $admin = $auth->createRole('admin');
        $student = $auth->createRole('student');
        
        // запишем их в БД
        $auth->add($admin);
        $auth->add($student);
        
        // Назначаем роль admin
        $auth->assign($admin, $adm->id); 
        $auth->assign($student, $user->id); 
    }
}