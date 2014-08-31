<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolesHasPermisosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles_has_permisos', function(Blueprint $table)
		{
			$table->integer('roles_id')->index('fk_roles_has_permisos_roles_idx');
			$table->integer('permisos_id')->index('fk_roles_has_permisos_permisos1_idx');
			$table->primary(['roles_id','permisos_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('roles_has_permisos');
	}

}
