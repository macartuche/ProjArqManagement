<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialHasTareaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('material_has_tarea', function(Blueprint $table)
		{
			$table->integer('material_id')->index('fk_material_has_tarea_material1_idx');
			$table->integer('tarea_id')->index('fk_material_has_tarea_tarea1_idx');
			$table->primary(['material_id','tarea_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('material_has_tarea');
	}

}
