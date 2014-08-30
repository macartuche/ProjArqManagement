<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->increments('id');
			$table->string('nombre');
			$table->string('logo');
			$table->string('sitioWeb'); 
			$table->string('direccion');
			$table->timestamps();
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
