<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRegistroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('registro', function(Blueprint $table)
		{
			$table->foreign('organizacion_id', 'fk_registro_organizacion1')->references('id')->on('organizacion')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('usuarios_id', 'fk_registro_usuarios1')->references('id')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('registro', function(Blueprint $table)
		{
			$table->dropForeign('organizacion_id');
			$table->dropForeign('usuarios_id');
		});
	}

}
