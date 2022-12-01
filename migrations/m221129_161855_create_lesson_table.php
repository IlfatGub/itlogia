<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson}}`.
 */
class m221129_161855_create_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(1000)->notNull(),
            'url' => $this->string()->notNull(),
            'visible' => $this->integer()->notNull(),
        ], $tableOptions);


        for($i = 1; $i <= 5; $i++){
            $this->insert('{{%lesson}}', 
            [
                'name'=>'Lesson '. $i, 
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
                'url'=>'https://www.youtube.com/embed/SrihQzC610M',
                'visible'=>1
        ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lesson}}');
    }
}
