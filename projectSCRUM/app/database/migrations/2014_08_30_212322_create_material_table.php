<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('material', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('nombreMaterial', 45)->nullable();
			$table->string('cantidad', 45)->nullable();
			$table->string('valor', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('material');
	}

}
