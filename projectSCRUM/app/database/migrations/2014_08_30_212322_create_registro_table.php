<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registro', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('accion', 100)->nullable();
			$table->integer('organizacion_id')->index('fk_registro_organizacion1_idx');
			$table->string('hora', 45)->nullable();
			$table->integer('usuarios_id')->index('fk_registro_usuarios1_idx');
			$table->primary(['id','organizacion_id','usuarios_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registro');
	}

}
