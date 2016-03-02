<?php
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\v1'], function ($api)
{
	$api->get('clientes', ['as' => 'clientes.index', 'uses' => 'Clientes@index']);

	/**
	 * Usuarios
	 */
	$api->resource('usuarios', 'Usuarios');
});
