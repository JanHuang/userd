
<?php

use FastD\Model\Migration;

class Group extends Migration
{
    /**
     * @return \Phinx\Db\Table
     */
    public function setUp()
    {
        $table = $this->table('groups');
        $table
            ->addColumn('name_singular', 'string', ['limit' => 100])
            ->addColumn('name_plural', 'string', ['limit' => 100])
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