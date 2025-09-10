<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNimToBiodata extends Migration
{
    public function up()
    {
        $this->forge->addColumn('biodata',[
            'nim' => [
                'type'           => 'VARCHAR',
                'constraint'     => 9,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('biodata','nim');
    }
}
