
<?php

use FastD\Model\Migration;

class Profile extends Migration
{
    /**
     * Set up database table schema
     */
    public function up()
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

        $this->insert('profile', [
            [
                'user_id' => 1,
                'nickname' => 'foo',
                'birthday' => '2016-01-01',
                'gender' => 1,
                'avatar' => '',
                'email' => '384099566@qq.com',
                'phone' => '',
                'country' => '中国',
                'province' => '广东',
                'city' => '广州',
                'region' => '天河区',
                'from' => 'fastd',
                'created' => date('Y-m-d'),
                'updated' => date('Y-m-d'),
            ]
        ]);
    }

    /**
     * delete data or truncate table
     */
    public function down()
    {
    
    }
}