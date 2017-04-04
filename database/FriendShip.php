
<?php

use FastD\Model\Migration;

class FriendShip extends Migration
{
    /**
     * Set up database table schema
     */
    public function up()
    {
        $table = $this->table('friend_ship', ['id' => false]);
        $table
            ->addColumn('user_id', 'string')
            ->addColumn('follow_id', 'string')
            ->addColumn('created', 'datetime')
        ;
        if (!$table->exists()) {
            $table->create();
        }
    }
}