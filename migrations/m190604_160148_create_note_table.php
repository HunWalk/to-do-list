<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%note}}`.
 */
class m190604_160148_create_note_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%note}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'title' => $this->string(),
            'body' => $this->text(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->createIndex('idx-note-user_id','note','user_id');

        $this->addForeignKey(
            'fk-note-user_id',
            'note',
            'user_id',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-note-user_id', 'note');

        $this->dropIndex('idx-note-user_id','note');

        $this->dropTable('{{%note}}');
    }
}
