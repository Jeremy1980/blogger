<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('email', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('password', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('first_name', 'string', [
            'limit' => 100,
            'null' => true,
        ]);
        $table->addColumn('last_name', 'string', [
            'limit' => 100,
            'null' => true,
        ]);
        $table->addColumn('role', 'string', [
            'default' => 'user',
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('active', 'boolean', [
            'default' => false,
            'null' => false,
        ]);
        $table->addColumn('token', 'string', [
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('reset_token', 'string', [
            'limit' => 255,
            'null' => true,
        ]);        
        $table->addColumn('reset_token_expires', 'datetime', [
            'null' => true,
        ]);        
        $table->addColumn('created', 'datetime', [
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'null' => false,
        ]);
        $table->addIndex(['email'], ['unique' => true]);
        $table->create();
    }
}
