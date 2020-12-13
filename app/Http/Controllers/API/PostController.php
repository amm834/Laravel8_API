<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
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
    /*@return if we get errs */
    $messages = [
      'required' => 'The :attribute field is required.',
    ];
    $validator = Validator::make($request->all(), [
      'title' => 'required',
      'description' => 'required'
    ], $messages);
    if ($validator->fails()) {
      return response()->json($validator->errors(), 200);
    } else {
      $data = Post::create([
        'title' => $request->get('title'),
        'description' => $request->get('description')
      ]);
      return response()->json(['post'=>$data, 'msg' => 'Post Created Successfully.'], 201);
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
    $data = Post::whereId($id)->firstOrFail();
    return response()->json($data, 200);
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
      'title' => $request->get('title'),
      'description' => $request->get('description')
    ]);
    return response()->json([$post,
      'msg' => 'Update Success'
    ], 200);
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
      'msg' => 'Delete Success'
    ], 200);
  }
}