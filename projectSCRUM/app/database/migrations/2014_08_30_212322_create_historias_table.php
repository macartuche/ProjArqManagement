<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('historias', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('resumen', 45)->nullable();
			$table->string('detalle', 45)->nullable();
			$table->string('presupuesto', 45)->nullable();
			$table->string('estadoActual', 45)->nullable();
			$table->string('puntuacion', 45)->nullable();
			$table->string('etiquetas', 45)->nullable();
			$table->integer('iteraciones_id')->index('fk_historias_iteraciones1_idx');
			$table->integer('categoria_id');
			$table->integer('categoria_categoria_id');
			$table->primary(['id','iteraciones_id']);
			$table->index(['categoria_id','categoria_categoria_id'], 'fk_historias_categoria1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('historias');
	}

}
