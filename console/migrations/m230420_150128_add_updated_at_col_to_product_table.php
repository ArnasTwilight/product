<?php

use yii\db\Migration;

/**
 * Class m230420_150128_add_updated_at_col_to_product_table
 */
class m230420_150128_add_updated_at_col_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'updated_at', $this->dateTime()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product}}', 'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230420_150128_add_updated_at_col_to_product_table cannot be reverted.\n";

        return false;
    }
    */
}
