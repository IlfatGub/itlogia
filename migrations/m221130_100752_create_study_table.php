<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%study}}`.
 */
class m221130_100752_create_study_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%study}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'lesson_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'user_study',  
            'study', 
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'lesson_study',
            'study',
            'lesson_id',
            'lesson',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%study}}');
    }
}
