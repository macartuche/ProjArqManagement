<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->integer('id');
			$table->string('nombre', 45)->nullable();
			$table->dateTime('fechaInicio')->nullable();
			$table->dateTime('fechaFin')->nullable();
			$table->decimal('presupuestoResumen', 6, 4)->nullable();
			$table->string('observaciones', 45)->nullable();
			$table->integer('organizacion_id')->index('fk_projectos_organizacion1_idx');
			$table->primary(['id','organizacion_id']);
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
