<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tarea', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('nombre', 250)->nullable();
			$table->string('descripcion', 500)->nullable();
			$table->string('etiquetas', 45)->nullable();
			$table->integer('historias_id');
			$table->integer('historias_iteraciones_id');
			$table->integer('comentarios_id')->index('fk_tarea_comentarios1_idx');
			$table->string('estimado', 45)->nullable();
			$table->string('faltante', 45)->nullable();
			$table->integer('usuarios_id')->index('fk_tarea_usuarios1_idx');
			$table->primary(['id','historias_id','historias_iteraciones_id']);
			$table->index(['historias_id','historias_iteraciones_id'], 'fk_tarea_historias1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tarea');
	}

}
