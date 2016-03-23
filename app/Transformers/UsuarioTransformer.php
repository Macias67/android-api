<?php
/**
 * User: Luis Macias
 * Date: 01/03/2016
 * Time: 11:04 PM
 */

namespace App\Transformers;

use App\Http\Models\Usuario\Usuario;
use League\Fractal\TransformerAbstract;

class UsuarioTransformer extends TransformerAbstract
{
	public function transform(Usuario $usuario)
	{
		return [
			'token'            => $usuario->token,
			'id'               => $usuario->id,
			'id_facebook'      => $usuario->id_facebook,
			'nombre'           => $usuario->nombre,
			'apellido'         => $usuario->apellido,
			'fecha_nacimiento' => $usuario->fecha_nacimiento,
			'email'            => $usuario->email,
			'sexo'             => $usuario->sexo,
			'created_at'       => $usuario->created_at,
			'updated_at'       => $usuario->updated_at
		];
	}
}