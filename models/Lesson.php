<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $url
 * @property string|null $visible
 */
class Lesson extends \yii\db\ActiveRecord
{

    public $_description;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }

    public function afterFind()
    {
        $this->_description = strlen($this->description) > 100 ? substr($this->description, 0, 100).' ...' : $this->description;
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'url'], 'required'],
            [['name', 'description', 'url', 'visible'], 'string', 'max' => 255],
        ];
    }

    /**
     * все опубликованные уроки
     */
    public function getLessonId(){
        return self::find()->select(['id'])->where(['visible' => 1])->column();
    }

    /**
     * не просмотренные уроки
     */
    public function getPassedLesson(){
        $study = new Study();

        $all_lesson  = self::getLessonId(); // все активные уроки(ID)
        $passed_lesson = $study->getUserLessonId(); // уроки просмотренные пользователем(ID)

        return array_diff($all_lesson, $passed_lesson); ;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'url' => 'Url',
            'visible' => 'Visible',
        ];
    }
}
