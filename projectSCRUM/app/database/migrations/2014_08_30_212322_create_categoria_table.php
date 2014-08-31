<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categoria', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('nombre');
			$table->integer('categoria_id')->index('fk_categoria_categoria1_idx');
			$table->primary(['id','categoria_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categoria');
	}

}
