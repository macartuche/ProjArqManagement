<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tarea', function(Blueprint $table)
		{
			$table->foreign('historias_id', 'fk_tarea_historias1')->references('id')->on('historias')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('comentarios_id', 'fk_tarea_comentarios1')->references('id')->on('comentarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('usuarios_id', 'fk_tarea_usuarios1')->references('id')->on('usuarios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tarea', function(Blueprint $table)
		{
			$table->dropForeign('historias_id');
			$table->dropForeign('comentarios_id');
			$table->dropForeign('usuarios_id');
		});
	}

}
