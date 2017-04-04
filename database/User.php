
<?php

use FastD\Model\Migration;

class User extends Migration
{
    /**
     * Set up database table schema
     */
    public function up()
    {
        $table = $this->table('users');
        $table
//            ->addColumn('user_id', 'string', ['limit' => 32])
            ->addColumn('username', 'string', ['limit' => 32])
            ->addColumn('password', 'string', ['limit' => 100])
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
}