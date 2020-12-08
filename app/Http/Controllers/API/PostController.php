<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index() {
		$data = Post::all();
		return response()->json($data, 200);
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request) {
		$data = Post::create([
			'title'=>$request->get('title'),
			'description'=>$request->get('description')
			]);
			return response()->json($data,200);
	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id) {
	  $data = Post::whereId($id)->firstOrFail();
	  return response()->json($data,200);
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id) {
		$post = Post::whereId($id)->firstOrFail();
		$post->update([
			'title'=>$request->get('title'),
			'description'=>$request->get('description')
			]);
			return response()->json([
				'msg'=>'Update Success'
				],200);
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id) {
		$post = Post::whereId($id)->firstOrFail();
		$post->delete();
		return response()->json([
			'msg'=>'Delete Success'
			],200);
	}
}