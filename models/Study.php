<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "study".
 *
 * @property int $id
 * @property int $user_id
 * @property int $lesson_id
 *
 * @property Lesson $lesson
 * @property User $user
 */
class Study extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'study';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'lesson_id'], 'required'],
            [['user_id', 'lesson_id'], 'integer'],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::class, 'targetAttribute' => ['lesson_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'lesson_id' => 'Lesson ID',
        ];
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::class, ['id' => 'lesson_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Список пройденных уроков для авторизованного пользователя
     */
    public function getUserLessonId(){
        return self::find()->select(['lesson_id'])->where(['user_id' => Yii::$app->user->id])->column();
    }

    /**
     * @var id
     * Проверяем урок на факт просмотренности
     */
    public function getLessonStudy(){
        return self::find()->where(['lesson_id' => $this->lesson_id, 'user_id' => Yii::$app->user->id])->exists();
    }
}
