<?php

namespace App\Http\Models\Cliente;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
	 * Nombre de la tabla usada por el modelo
	 *
	 * @var string
	 */
	protected $table = 'tg_tags';

	public $incrementing = false;

	public $timestamps = false;
}
