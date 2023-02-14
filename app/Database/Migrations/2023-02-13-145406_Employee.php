<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employee extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT'
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'create_date' => [
                'type' => 'INT'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');
        $this->forge->createTable('employee');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
