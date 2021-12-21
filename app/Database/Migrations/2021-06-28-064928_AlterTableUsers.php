<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterTableUsers extends Migration
{
	public function up()
	{
		$fields = [
			'fullname'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'password_hash'],
			'address'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'fullname'],
			'phone'         => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true, 'after' => 'address'],
			'perpus'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'phone'],
			'user_image'    => ['type' => 'VARCHAR', 'constraint' => 255, 'default' => 'default.jpg', 'after' => 'perpus'],
		];
		$this->forge->addColumn('users', $fields);
	}

	public function down()
	{
		// drop new columns
		$this->forge->dropColumn('users', 'fullname');
		$this->forge->dropColumn('users', 'address');
		$this->forge->dropColumn('users', 'phone');
		$this->forge->dropColumn('users', 'perpus');
		$this->forge->dropColumn('users', 'user_image');
	}
}
