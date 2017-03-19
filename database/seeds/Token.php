
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
            ->addColumn('user_id', 'string')
            ->addColumn('access_token')
            ->addColumn('refresh_token')
            ->addColumn('expires')
            ->addColumn('access_ip')
            ->addColumn('created')
        ;
        $table->create();
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