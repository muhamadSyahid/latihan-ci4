<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'mahasiswa_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L','P'],
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
        ]);
        $this->forge->addKey('mahasiswa_id', true);
        $this->forge->createTable('biodata');
    }

    public function down()
    {
        $this->forge->dropTable('biodata');
    }
}
