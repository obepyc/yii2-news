<?php

use yii\db\Schema;
use yii\db\Migration;

class m160102_161106_create_table_post extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%post}}', [
            'id'         => $this->primaryKey(),
            'catId'      => $this->integer(),
            'title'      => $this->string()->notNull(),
            'sText'      => $this->text(),
            'text'       => $this->text(),
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createIndex('FK_post_category', '{{%post}}', 'catId');
        $this->addForeignKey(
            'FK_post_category', '{{%post}}', 'catId', '{{%category}}', 'id', 'SET NULL', 'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%post}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
