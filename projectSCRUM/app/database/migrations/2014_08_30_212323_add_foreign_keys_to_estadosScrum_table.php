<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEstadosScrumTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('estadosScrum', function(Blueprint $table)
		{
			$table->foreign('tarea_id', 'fk_estadosScrum_tarea1')->references('id')->on('tarea')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('estadosScrum', function(Blueprint $table)
		{
			$table->dropForeign('tarea_id');
		});
	}

}
