<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kd_buku' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'auto_increment' => true,
            ],
            'judul_buku' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'pengarang' => [
                'type'       => 'VARCHAR',
                'constraint' => '35',
            ],
            'penerbit' => [
                'type'       => 'VARCHAR',
                'constraint' => '35',
            ],
        ]);
        $this->forge->addKey('kd_buku', true);
        $this->forge->createTable('tbl_buku');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_buku');
    }
}
