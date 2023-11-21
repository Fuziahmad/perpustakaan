<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPeminjamanMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'kd_buku' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'pinjam' => [
                'type'       => 'DATE',
                'null'      => true
            ],
            'kembali' => [
                'type'       => 'DATE',
                'null'      => true
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['Di Pinjam', 'Kembali']
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'      => true
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'      => true
            ],

        ]);

        $this->forge->addForeignKey('id_user', 'users', 'id');
        $this->forge->addForeignKey('kd_buku', 'tbl_buku', 'kd_buku');

        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_peminjaman');
    }

    public function down()
    {
        $this->forge->dropForeignKey('tbl_peminjaman', 'tbl_peminjaman_id_user_foreign');
        $this->forge->dropForeignKey('tbl_peminjaman', 'tbl_peminjaman_kd_buku_foreign');
        $this->forge->dropTable('tbl_peminjaman');
    }
}
