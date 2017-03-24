
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
        if ($this->hasTable('profile')) {
            if (!$table->hasColumn('nickname')) {
                $table
                    ->addColumn('nickname', 'string', ['limit' => 20, 'after' => 'password'])
                    ->addColumn('birthday', 'date', ['after' => 'nickname'])
                    ->addColumn('gender', 'integer', ['after' => 'birthday'])
                    ->addColumn('avatar', 'string', ['limit' => 160, 'after' => 'gender'])
                    ->addColumn('country', 'string', ['limit' => 20, 'after' => 'avatar'])
                    ->addColumn('province', 'string', ['limit' => 20, 'after' => 'country'])
                    ->addColumn('city', 'string', ['limit' => 20, 'after' => 'province'])
                    ->addColumn('region', 'string', ['limit' => 20, 'after' => 'city'])
                    ->addColumn('from', 'string', ['limit' => 32, 'after' => 'region'])
                    ->update();
            }
        }elseif(!$table->exists()){
            $table
                ->addColumn('user_id', 'string')
                ->addColumn('account', 'string', ['limit' => 32])
                ->addColumn('email', 'string', ['limit' => 30])
                ->addColumn('phone', 'string', ['limit' => 30])
                ->addColumn('password', 'string', ['limit' => 32])
                ->addColumn('nickname', 'string', ['limit' => 20]) //limit line
                ->addColumn('birthday', 'date')
                ->addColumn('gender', 'integer')
                ->addColumn('avatar', 'string', ['limit' => 160])
                ->addColumn('country', 'string', ['limit' => 20])
                ->addColumn('province', 'string', ['limit' => 20])
                ->addColumn('city', 'string', ['limit' => 20])
                ->addColumn('region', 'string', ['limit' => 20])
                ->addColumn('from', 'string', ['limit' => 32]) //limit line
                ->addColumn('created', 'date')
                ->addColumn('updated', 'date')
                ->create();
        }

    }


    /**
     * delete data or truncate table
     */
    public function down()
    {

    }
}