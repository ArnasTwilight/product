<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%form_factor}}`.
 */
class m230417_164718_create_form_factor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%form_factor}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
        ]);

        // creates index for column 'product'
        $this->createIndex(
            'idx_product-form_factor',
            'product',
            'form_factor_id'
        );

        // add foreign key for table 'product'
        $this->addForeignKey(
            'fk_product-form_factor',
            'product',
            'form_factor_id',
            'form_factor',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%form_factor}}');
    }
}
