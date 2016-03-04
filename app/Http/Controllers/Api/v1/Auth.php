<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Models\Usuario\Usuario;
use App\Http\Requests;
use Dingo\Api\Facade\API;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class Auth extends Controller
{
	use Helpers;

	public function me(Request $request)
	{
		return JWTAuth::parseToken()->authenticate();
	}

	public function register(Requests\CreateUsuario $request)
	{
		$usuario = Usuario::create($request->only([
			'id',
			'nombre',
			'apellido',
			'fecha_nacimiento',
			'email',
			'sexo',
			'password',
			'ultima_sesion'
		]));
		$token = JWTAuth::fromUser($usuario);

		$response = [
			'token' => $token,
			'data'  => $usuario
		];

		return $this->response->array($response);
	}

	public function authenticate(Request $request)
	{
		// grab credentials from the request
		$credentials = $request->only('email', 'password');
		try
		{
			// attempt to verify the credentials and create a token for the user
			if (!$token = JWTAuth::attempt($credentials))
			{
				throw new UnauthorizedHttpException(null, 'No se puede autenticar con este nombre de usuario y contraseña.');
			}
		}
		catch (JWTException $e)
		{
			// something went wrong whilst attempting to encode the token
			throw new HttpException($e->getStatusCode(), $e->getMessage());
		}

		// all good so return the token
		return $this->response->array(compact('token'));
	}

	public function validateToken()
	{
		// Our routes file should have already authenticated this token, so we just return success here
		return API::response()->array(['status' => 'success'])->statusCode(200);
	}
}
