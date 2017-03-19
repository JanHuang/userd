
<?php

use FastD\Model\Migration;

class Token extends Migration
{
    /**
     * Set up database table schema
     */
    public function setUp()
    {
        $table = $this->table('account', ['id' => false]);
        $table
            ->addColumn('user_id', 'string', ['limit' => 32])
            ->addColumn('access_token', 'string', ['limit' => 32])
            ->addColumn('refresh_token', 'string', ['limit' => 32])
            ->addColumn('expires', 'integer')
            ->addColumn('access_ip', 'integer')
            ->addColumn('created', 'date')
        ;
        if (!$table->exists()) {
            $table->create();
        }
    }

    /**
     * Insert into data set in table
     */
    public function dataSet()
    {
    
    }

    /**
     * delete data or truncate table
     */
    public function tearDown()
    {
    
    }
}