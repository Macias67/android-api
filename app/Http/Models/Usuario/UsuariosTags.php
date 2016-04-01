<?php

namespace App\Http\Models\Usuario;

use App\Http\Models\Traits\UniqueID;
use Illuminate\Database\Eloquent\Model;

class UsuariosTags extends Model
{
	use UniqueID;

	/**
	 * Nombre de la tabla usada por el modelo
	 *
	 * @var string
	 */
	protected $table = 'usr_usuarios_tags';

	public $incrementing = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'usuario_id',
		'tag_id'
	];
}
