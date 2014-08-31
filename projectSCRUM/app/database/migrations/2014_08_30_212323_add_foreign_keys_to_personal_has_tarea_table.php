<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPersonalHasTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('personal_has_tarea', function(Blueprint $table)
		{
			$table->foreign('personal_id', 'fk_personal_has_tarea_personal1')->references('id')->on('personal')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('tarea_id', 'fk_personal_has_tarea_tarea1')->references('id')->on('tarea')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('personal_has_tarea', function(Blueprint $table)
		{
			$table->dropForeign('personal_id');
			$table->dropForeign('tarea_id');
		});
	}

}
