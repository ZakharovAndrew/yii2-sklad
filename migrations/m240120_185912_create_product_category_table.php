<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_category`.
 */
class m240120_185912_create_product_category_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'product_category',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull(),
            ]
        );
    }

    public function down()
    {
        $this->dropTable('product_category');
    }
}
