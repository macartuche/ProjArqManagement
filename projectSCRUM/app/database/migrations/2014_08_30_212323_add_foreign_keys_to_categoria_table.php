<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categoria', function(Blueprint $table)
		{
			$table->foreign('categoria_id', 'fk_categoria_categoria1')->references('id')->on('categoria')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('categoria', function(Blueprint $table)
		{
			$table->dropForeign('categoria_id');
		});
	}

}
