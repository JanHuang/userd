
<?php

use FastD\Model\Migration;

class User extends Migration
{
    /**
     * @return \Phinx\Db\Table
     */
    public function setUp()
    {
        $table = $this->table('users');
        $table
            ->addColumn('username', 'string', ['limit' => 32])
            ->addColumn('password', 'string', ['limit' => 100])
            ->addColumn('nickname', 'string', ['limit' => 20])
            ->addColumn('birthday', 'datetime')
            ->addColumn('gender', 'integer')
            ->addColumn('avatar', 'string', ['limit' => 160])
            ->addColumn('email', 'string', ['limit' => 30])
            ->addColumn('phone', 'string', ['limit' => 30])
            ->addColumn('country', 'string', ['limit' => 20])
            ->addColumn('province', 'string', ['limit' => 20])
            ->addColumn('city', 'string', ['limit' => 20])
            ->addColumn('region', 'string', ['limit' => 20])
            ->addColumn('from', 'string', ['limit' => 32])
            ->addColumn('followings', 'integer')
            ->addColumn('followers', 'integer')
        ;
        return $table;
    }

    /**
     * @param \Phinx\Db\Table $table
     *
     * @return mixed
     */
    public function dataSet(\Phinx\Db\Table $table)
    {
        // TODO: Implement dataSet() method.
    }
}