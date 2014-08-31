<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHistoriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('historias', function(Blueprint $table)
		{
			$table->foreign('iteraciones_id', 'fk_historias_iteraciones1')->references('id')->on('iteraciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('categoria_id', 'fk_historias_categoria1')->references('id')->on('categoria')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('historias', function(Blueprint $table)
		{
			$table->dropForeign('iteraciones_id');
			$table->dropForeign('categoria_id');
		});
	}

}
