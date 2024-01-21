<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_materials`.
 */
class m240120_191112_create_product_materials_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'product_materials',
            [
                'id' => $this->primaryKey(),
                'product_id' => $this->integer(),
                'material_id' => $this->integer(),
                'material_count' => $this->integer(),
                'comments' => $this->string(500)
            ]
        );
    }

    public function down()
    {
        $this->dropTable('product_materials');
    }
}
