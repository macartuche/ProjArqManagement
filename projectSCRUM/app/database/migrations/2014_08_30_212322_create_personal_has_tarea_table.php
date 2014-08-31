<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonalHasTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personal_has_tarea', function(Blueprint $table)
		{
			$table->integer('personal_id')->index('fk_personal_has_tarea_personal1_idx');
			$table->integer('tarea_id');
			$table->integer('tarea_historias_id');
			$table->integer('tarea_historias_iteraciones_id');
			$table->primary(['personal_id','tarea_id','tarea_historias_id','tarea_historias_iteraciones_id']);
			$table->index(['tarea_id','tarea_historias_id','tarea_historias_iteraciones_id'], 'fk_personal_has_tarea_tarea1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personal_has_tarea');
	}

}
