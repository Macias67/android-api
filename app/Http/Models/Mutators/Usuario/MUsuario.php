<?php

namespace App\Http\Models\Mutators\Usuario;

use App\Http\Models\Traits\UniqueID;
use Jenssegers\Date\Date;

trait MUsuario
{
	use UniqueID;

	public function setIdAttribute()
	{
		$this->attributes['id'] = $this->getUniqueID();
	}

	public function setNombreAttribute($value)
	{
		$this->attributes['nombre'] = mb_convert_case(trim(mb_strtolower($value)), MB_CASE_TITLE, "UTF-8");
	}

	public function setApellidoAttribute($value)
	{
		$this->attributes['apellido'] = mb_convert_case(trim(mb_strtolower($value)), MB_CASE_TITLE, "UTF-8");
	}

	public function setEmailAttribute($value)
	{
		$this->attributes['email'] = trim($value);
	}

	public function setSexoAttribute($value)
	{
		if ($value === 'Hombre' OR $value === 'Mujer')
		{
			$this->attributes['sexo'] = trim((string)$value[0]);
		}
		else
		{
			$this->attributes['sexo'] = trim($value);
		}
	}

	public function setFechaNacimientoAttribute($value)
	{
		$this->attributes['fecha_nacimiento'] = Date::createFromFormat('d/m/Y', $value)->format('Y-m-d');
	}

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = bcrypt($value);
	}

	public function setUltimaSesionAttribute()
	{
		$this->attributes['ultima_sesion'] = date('Y-m-d H:i:s');
	}
}