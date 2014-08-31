<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Organizacion extends Eloquent {
 

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'organizacion';

	protected $fillable = array('nombre');

	public function proyectos(){
		return $this->hasMany('Proyectos');
	}
}
