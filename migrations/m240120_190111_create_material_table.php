<?php

use yii\db\Migration;

/**
 * Handles the creation of table `material`.
 */
class m240120_190111_create_material_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'material',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull(),
                'images' => $this->text(),
                'material_category_id' => $this->integer(),
                'cost' => $this->integer(),
                'units_of_measure' => $this->integer(),
                'comments' => $this->string(500),
            ]
        );
    }

    public function down()
    {
        $this->dropTable('material');
    }
}
