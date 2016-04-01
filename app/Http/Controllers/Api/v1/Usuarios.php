<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Models\Usuario\Usuario;
use App\Transformers\UsuarioTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Usuarios extends Controller
{
	use Helpers;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return $this->response->collection(Usuario::all(), new UsuarioTransformer());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \App\Http\Requests\CreateUsuario $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Requests\CreateUsuario $request)
	{
		$usuario = new Usuario;
		$usuario->preparaDatos($request);
		$usuario->save();

		return $this->response->item($usuario, new UsuarioTransformer());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		dd($request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}


	public function putTags(Request $request, $id) {
		dd($request->all());
	}

	public function getTags() {
		return '{
    "data":{
        "tags":[
            {"id":"eMgRBkrQZepY8Dxl","tag":"ropa de mujer"},
            {"id":"wD1VnMqlx5qQAEKz","tag":"arreglos florales"},
            {"id":"Y7AaMdp47NrJyGkB","tag":"perfumes"},
            {"id":"8ekd73rKkwrwNg2M","tag":"lentes"},
            {"id":"z7M5XOrORAolNvKj","tag":"ropa de hombre"},
            {"id":"YVJlZgoExnqM3nW7","tag":"micheladas"},
            {"id":"DOxLAbqBK0oywv1N","tag":"frapuccino"},
            {"id":"Rb6DB0qwzKp3zlgW","tag":"flores"},
            {"id":"bP79zmp43grgkKx1","tag":"heineken"},
            {"id":"QMyOYkqGQYrmJ1AV","tag":"calzado"},
            {"id":"xlYnXWoXDDokKdJ4","tag":"zapatos de fútbol"},
            {"id":"l0w6A7odm6rEYBvK","tag":"centros de mesa"},
            {"id":"XVwJ4Mo1dXqAZLQg","tag":"tecate"},
            {"id":"PZYWB4qBdMr79zey","tag":"regalos"},
            {"id":"yReZY0odKJq2d9gD","tag":"cerveza inidio"}
        ]
        
    }';
	}
}
