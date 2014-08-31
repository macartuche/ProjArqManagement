<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMiembrosEquipoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('miembrosEquipo', function(Blueprint $table)
		{
			$table->integer('usuarios_id')->index('fk_usuarios_has_equipos_usuarios1_idx');
			$table->integer('equipos_id')->index('fk_usuarios_has_equipos_equipos1_idx');
			$table->integer('id');
			$table->integer('projectos_id');
			$table->integer('projectos_organizacion_id');
			$table->primary(['id','projectos_id','projectos_organizacion_id']);
			$table->index(['projectos_id','projectos_organizacion_id'], 'fk_miembrosEquipo_projectos1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('miembrosEquipo');
	}

}
