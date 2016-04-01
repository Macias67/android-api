<?php

namespace App\Http\Models\Usuario;

use Illuminate\Database\Eloquent\Model;

class ViewUsuarioTags extends Model
{
	/**
	 * Nombre de la tabla usada por el modelo
	 *
	 * @var string
	 */
	protected $table = 'v_usuario_tags';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'usuario_id',
		'tags',
	        'total_tags'
	];
}
