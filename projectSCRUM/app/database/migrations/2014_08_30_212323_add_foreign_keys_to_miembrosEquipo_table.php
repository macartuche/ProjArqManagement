<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMiembrosEquipoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('miembrosEquipo', function(Blueprint $table)
		{
			$table->foreign('usuarios_id', 'fk_usuarios_has_equipos_usuarios1')->references('id')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('equipos_id', 'fk_usuarios_has_equipos_equipos1')->references('id')->on('equipos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('projectos_id', 'fk_miembrosEquipo_projectos1')->references('id')->on('proyectos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('miembrosEquipo', function(Blueprint $table)
		{
			$table->dropForeign('usuarios_id');
			$table->dropForeign('equipos_id');
			$table->dropForeign('projectos_id');
		});
	}

}
