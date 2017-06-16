
<?php

use FastD\Model\Migration;

class FriendShip extends Migration
{
    /**
     * @return \Phinx\Db\Table
     */
    public function setUp()
    {
        $table = $this->table('friend_ship', ['id' => false]);
        $table
            ->addColumn('user_id', 'string')
            ->addColumn('follow_id', 'string')
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