<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Models\Usuario\UsuariosTags as UsuariosTagsModel;
use App\Http\Models\Usuario\ViewUsuarioTags;
use App\Http\Requests;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

class UsuariosTags extends Controller
{
	use Helpers;
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param                           $usuario_id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $usuario_id)
	{
		$data = $request->get('data');

		$insert = [];
		foreach ($data['tags'] as $index => $tag)
		{
			$insert[$index] = [
				'id'         => (new UsuariosTagsModel())->getUniqueID(rand(10, 16)),
				'usuario_id' => $usuario_id,
				'tag_id'     => $tag['id'],
			];
		}

		UsuariosTagsModel::deleteTagsUser($usuario_id);
		UsuariosTagsModel::insert($insert);
		$result = ViewUsuarioTags::where('usuario_id', $usuario_id)->first()->toArray();

		$data = [
			'data' => [
				'usuario_id' => $result['usuario_id'],
				'tags'       => explode(',', $result['tags']),
				'total_tags' => $result['total_tags']
			]
		];

		return $this->response->array($data);
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
		//
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
}
