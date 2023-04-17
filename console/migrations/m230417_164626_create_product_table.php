<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m230417_164626_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'url' => $this->string()->notNull()->unique(),
            'price' => $this->decimal(),
            'old_price' => $this->decimal(),
            'description' => $this->text(),
            'image' => $this->string(),

            'form_factor_id' => $this->integer(),
            'created_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
