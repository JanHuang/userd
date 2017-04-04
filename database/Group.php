
<?php

use FastD\Model\Migration;

class Group extends Migration
{
    /**
     * Set up database table schema
     */
    public function up()
    {
        $table = $this->table('groups');
        $table
            ->addColumn('name_singular', 'string', ['limit' => 100])
            ->addColumn('name_plural', 'string', ['limit' => 100])
            ->addColumn('created', 'datetime')
        ;
        if (!$table->exists()) {
            $table->create();
        }
    }
}