<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proyectos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->date('fechaInicio');
			$table->date('fechaFin');
			$table->decimal('presupuestoInicial',6,4);
			$table->decimal('presupuestoResumen',6,4);
			$table->string('observacion');
			$table->integer('organizacion_id');
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
		Schema::drop('proyectos');
	}

}
