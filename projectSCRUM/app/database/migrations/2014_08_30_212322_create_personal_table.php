<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personal', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('tipoPersonal', 500)->nullable();
			$table->decimal('presupuesto', 6, 4)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personal');
	}

}
