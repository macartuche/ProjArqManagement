<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIteracionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('iteraciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->date('fechaInicio');
			$table->date('fechaFin');
			$table->integer('ptosResumen');
			$table->decimal('presupuestoResumen', 6,4);
			$table->integer('proyectos_id');
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
		Schema::drop('iteraciones');
	}

}
