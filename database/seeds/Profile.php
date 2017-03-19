
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
            ->addColumn('user_id')
            ->addColumn('nickname')
            ->addColumn('birthday')
            ->addColumn('gender')
            ->addColumn('avatar')
            ->addColumn('email')
            ->addColumn('phone')
            ->addColumn('country')
            ->addColumn('province')
            ->addColumn('city')
            ->addColumn('region')
            ->addColumn('from')
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