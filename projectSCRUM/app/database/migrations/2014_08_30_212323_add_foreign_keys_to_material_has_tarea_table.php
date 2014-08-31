<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMaterialHasTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('material_has_tarea', function(Blueprint $table)
		{
			$table->foreign('material_id', 'fk_material_has_tarea_material1')->references('id')->on('material')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('tarea_id', 'fk_material_has_tarea_tarea1')->references('id')->on('tarea')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('material_has_tarea', function(Blueprint $table)
		{
			$table->dropForeign('material_id');
			$table->dropForeign('tarea_id');
		});
	}

}
