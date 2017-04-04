
<?php

use FastD\Model\Migration;

class Token extends Migration
{
    /**
     * Set up database table schema
     */
    public function up()
    {
        $table = $this->table('tokens', ['id' => false]);
        $table
            ->addColumn('user_id', 'string')
            ->addColumn('access_token', 'string', ['limit' => 32])
            ->addColumn('refresh_token', 'string', ['limit' => 30])
            ->addColumn('expire', 'integer')
            ->addColumn('role', 'string')
            ->addColumn('ip', 'integer', ['limit' => 10])
            ->addColumn('created', 'datetime')
        ;
        if (!$table->exists()) {
            $table->create();
        }
    }

    /**
     * delete data or truncate table
     */
    public function down()
    {
    
    }
}