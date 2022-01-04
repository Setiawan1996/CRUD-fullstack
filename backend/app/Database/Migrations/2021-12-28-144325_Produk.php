<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
        	'id' => [
        		'type'			=> 'INT',
        		'constraint'	=> 5,
        		'auto_increment'=> true
        	],
        	'judul' => [
        		'type'			=> 'VARCHAR',
        		'constraint'	=> 200,
        	],
        	'harga' => [
        		'type'			=> 'INT',
        		'constraint'	=> 11,
        		
        	],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        //
    }
}
