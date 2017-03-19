
<?php

use FastD\Model\Migration;

class Account extends Migration
{
    /**
     * Set up database table schema
     */
    public function setUp()
    {
        $table = $this->table('account', ['id' => false]);
        $table
            ->addColumn('user_id')
            ->addColumn('account')
            ->addColumn('email')
            ->addColumn('phone')
            ->addColumn('password')
            ->addColumn('created')
            ->addColumn('updated')
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