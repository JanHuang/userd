
<?php

use FastD\Model\Migration;

class Account extends Migration
{
    /**
     * Set up database table schema
     */
    public function up()
    {
        $table = $this->table('account', ['id' => false]);
        $table
            ->addColumn('user_id', 'string')
            ->addColumn('account', 'string', ['limit' => 32])
            ->addColumn('email', 'string', ['limit' => 30])
            ->addColumn('phone', 'string', ['limit' => 30])
            ->addColumn('password', 'string', ['limit' => 32])
            ->addColumn('created', 'date')
            ->addColumn('updated', 'date')
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