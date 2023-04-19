<?php

use yii\db\Migration;

/**
 * Class m230419_180118_add_role_col_to_user_table
 */
class m230419_180118_add_role_col_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'roles', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'roles');
    }
}
