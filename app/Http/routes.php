<?php
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\v1'], function ($api)
{
	/**
	 * Auth
	 */
	$api->post('registro', ['uses' => 'Auth@register']);
	$api->post('auth', ['uses' => 'Auth@authenticate']);

	/**
	 * Usuarios
	 */
	$api->resource('usuarios', 'Usuarios');

	/**
	 * Clientes
	 */
	$api->get('clientes', ['as' => 'clientes.index', 'uses' => 'Clientes@index']);

});
