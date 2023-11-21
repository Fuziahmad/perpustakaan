<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Maker extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kd_maker' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'nomor_kontak' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ]
        ]);
        $this->forge->addKey('kd_maker', true);
        $this->forge->createTable('tbl_maker');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_maker');
    }
}
