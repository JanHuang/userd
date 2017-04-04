
<?php

use FastD\Model\Migration;

class UserGroup extends Migration
{
    /**
     * Set up database table schema
     */
    public function up()
    {
        $table = $this->table('user_groups', ['id' => false]);
        $table
            ->addColumn('user_id', 'string')
            ->addColumn('group_id', 'string')
            ->addColumn('created', 'datetime')
        ;
        if (!$table->exists()) {
            $table->create();
        }
    }
}