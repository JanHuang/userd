
<?php

use FastD\Model\Migration;

class UserGroup extends Migration
{
    /**
     * @return \Phinx\Db\Table
     */
    public function setUp()
    {
        $table = $this->table('user_groups', ['id' => false]);
        $table
            ->addColumn('user_id', 'string')
            ->addColumn('group_id', 'string')
            ->addColumn('created', 'datetime')
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