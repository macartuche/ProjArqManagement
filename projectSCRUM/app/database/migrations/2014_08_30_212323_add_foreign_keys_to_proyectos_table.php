<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProyectosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('proyectos', function(Blueprint $table)
		{
			$table->foreign('organizacion_id', 'fk_projectos_organizacion1')->references('id')->on('organizacion')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('proyectos', function(Blueprint $table)
		{
			$table->dropForeign('organizacion_id');
		});
	}

}
