<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->integer('id');
			$table->string('nombre', 45)->nullable();
			$table->string('fechaInicio', 45)->nullable();
			$table->string('FechaFin', 45)->nullable();
			$table->decimal('ptosResumen', 6, 4)->nullable();
			$table->decimal('presupuestoResumen', 6, 4)->nullable();
			$table->integer('projectos_id')->index('fk_iteraciones_projectos1_idx');
			$table->primary(['id','projectos_id']);
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
