<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRolesHasUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('roles_has_usuarios', function(Blueprint $table)
		{
			$table->foreign('roles_id', 'fk_roles_has_usuarios_roles1')->references('id')->on('roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('usuarios_id', 'fk_roles_has_usuarios_usuarios1')->references('id')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('roles_has_usuarios', function(Blueprint $table)
		{
			$table->dropForeign('roles_id');
			$table->dropForeign('usuarios_id');
		});
	}

}
