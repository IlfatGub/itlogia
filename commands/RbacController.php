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
        

        $model = User::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new User();
            $user->username = 'admin';
            $user->email = 'admin@yoursite.ru';
            $user->setPassword('admin');
            $user->generateAuthKey();
            if ($user->save()) {
                echo 'good';
            }
        }

        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...
        
        // Создадим роли админа и редактора новостей
        $admin = $auth->createRole('admin');
        $student = $auth->createRole('student');
        
        // запишем их в БД
        $auth->add($admin);
        $auth->add($student);
        
        // Назначаем роль admin
        $auth->assign($admin, $user->id); 
    }
}