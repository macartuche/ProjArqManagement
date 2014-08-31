<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToIteracionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('iteraciones', function(Blueprint $table)
		{
			$table->foreign('projectos_id', 'fk_iteraciones_projectos1')->references('id')->on('proyectos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('iteraciones', function(Blueprint $table)
		{
			$table->dropForeign('projectos_id');
		});
	}

}
