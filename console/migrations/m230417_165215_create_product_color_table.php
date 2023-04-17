<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_color}}`.
 */
class m230417_165215_create_product_color_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_color}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->Integer(),
            'color_id' => $this->Integer(),
        ]);

        // creates index for column 'product_id'
        $this->createIndex(
            'idx_product_color-product_id',
            'product_color',
            'product_id'
        );

        // add foreign key for table 'product'
        $this->addForeignKey(
            'fk_product_color-product_id',
            'product_color',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );

        // creates index for column 'color_id'
        $this->createIndex(
            'idx_product_color-color_id',
            'product_color',
            'color_id'
        );

        // add foreign key for table 'color'
        $this->addForeignKey(
            'fk_product_color-color_id',
            'product_color',
            'color_id',
            'color',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_color}}');
    }
}
