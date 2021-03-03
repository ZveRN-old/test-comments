<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m210303_060840_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'text' => $this->text(),
            'file' => $this->string()->notNull(),
            'activ' => $this->boolean()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comments}}');
    }
}
