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
	protected $table = 'usr_usuario_tags';

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
	
	public static function getTableName()
	{
		return with(new static)->getTable();
	}

	public function scopeDeleteTagsUser($query, $usuario_id)
	{
		return $query->where('usuario_id', $usuario_id)->delete();
	}
}
