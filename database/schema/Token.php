
<?php

use FastD\Model\Migration;

class Token extends Migration
{
    /**
     * @return \Phinx\Db\Table
     */
    public function setUp()
    {
        $table = $this->table('tokens', ['id' => false]);
        $table
            ->addColumn('user_id', 'string')
            ->addColumn('access_token', 'string', ['limit' => 32])
            ->addColumn('refresh_token', 'string', ['limit' => 30])
            ->addColumn('expire', 'integer')
            ->addColumn('scope', 'string')
            ->addColumn('ip', 'integer', ['limit' => 10])
            ->addColumn('status', 'integer', ['limit' => 1])
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