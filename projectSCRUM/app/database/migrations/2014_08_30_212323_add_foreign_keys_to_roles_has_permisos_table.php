<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRolesHasPermisosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('roles_has_permisos', function(Blueprint $table)
		{
			$table->foreign('roles_id', 'fk_roles_has_permisos_roles')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('permisos_id', 'fk_roles_has_permisos_permisos1')->references('id')->on('permisos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('roles_has_permisos', function(Blueprint $table)
		{
			$table->dropForeign('roles_id');
			$table->dropForeign('permisos_id');
		});
	}

}
