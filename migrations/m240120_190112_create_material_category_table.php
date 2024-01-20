<?php

use yii\db\Migration;

/**
 * Handles the creation of table `material_category`.
 */
class m240120_190112_create_material_category_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'material_category',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull(),
            ]
        );
    }

    public function down()
    {
        $this->dropTable('material_category');
    }
}
