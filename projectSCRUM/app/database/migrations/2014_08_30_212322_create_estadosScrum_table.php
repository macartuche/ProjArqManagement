<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadosScrumTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estadosScrum', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('nombre', 45)->nullable();
			$table->integer('tarea_id')->index('fk_estadosScrum_tarea1_idx');
			$table->primary(['id','tarea_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estadosScrum');
	}

}
