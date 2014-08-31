<?php

class Proyectos extends Eloquent {
 

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'proyectos';

	protected $fillable = array('nombre', 'fechaInicio', 'presupuestoResumen');

	//proyectos belongs_to organizacion
	public function organizacion()
	{
		return $this->belongsTo('Organizacion');
	}
}
