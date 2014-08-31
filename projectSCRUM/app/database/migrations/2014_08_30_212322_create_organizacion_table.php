<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrganizacionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('organizacion', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('nombre', 45)->nullable();
			$table->string('logo', 45)->nullable();
			$table->string('direccion', 45)->nullable();
			$table->string('sitioweb', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('organizacion');
	}

}
