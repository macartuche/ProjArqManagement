<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesHasUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles_has_usuarios', function(Blueprint $table)
		{
			$table->integer('roles_id')->index('fk_roles_has_usuarios_roles1_idx');
			$table->integer('usuarios_id')->index('fk_roles_has_usuarios_usuarios1_idx');
			$table->primary(['roles_id','usuarios_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('roles_has_usuarios');
	}

}
