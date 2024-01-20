<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m240120_185911_create_product_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'product',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(500)->notNull(),
                'images' => $this->text(),
                'link' => $this->string(500),
                'product_category_id' => $this->integer(),
                'comments' => $this->string(500),
                'good' => $this->integer(),
                'bad' => $this->integer(),
            ]
        );
    }

    public function down()
    {
        $this->dropTable('product');
    }
}
