<?php
Route::get('/', function() {
	return view('welcome');
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\v1'], function ($api)
{
	/**
	 * Auth
	 */
	$api->post('registro', ['uses' => 'Auth@register']);
	$api->post('registro/fb', ['uses' => 'Auth@registerFB']);
	$api->post('auth', ['uses' => 'Auth@authenticate']);

	$api->group(['middleware' => 'jwt.auth'], function($api)
	{
		$api->get('usuarios/yo', 'Auth@me');
		$api->get('validatetoken', 'Auth@validateToken');

		/**
		 * Usuarios
		 */
		$api->resource('usuarios', 'Usuarios');

		/**
		 * Clientes
		 */
		$api->resource('clientes', 'Clientes');
	});
});
