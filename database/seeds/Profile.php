
<?php

use FastD\Model\Migration;

class Profile extends Migration
{
    /**
     * Set up database table schema
     */
    public function setUp()
    {
        $table = $this->table('profile', ['id' => false]);
        $table
            ->addColumn('user_id', 'string', ['limit' => 32])
            ->addColumn('nickname', 'string', ['limit' => 20])
            ->addColumn('birthday', 'date')
            ->addColumn('gender', 'integer')
            ->addColumn('avatar', 'string', ['limit' => 160])
            ->addColumn('email', 'string', ['limit' => 30])
            ->addColumn('phone', 'string', ['limit' => 30])
            ->addColumn('country', 'string', ['limit' => 20])
            ->addColumn('province', 'string', ['limit' => 20])
            ->addColumn('city', 'string', ['limit' => 20])
            ->addColumn('region', 'string', ['limit' => 20])
            ->addColumn('from', 'string', ['limit' => 32])
            ->addColumn('created', 'date')
            ->addColumn('updated', 'date')
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