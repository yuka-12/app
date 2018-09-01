<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class AppController extends Controller
{

  public function get()
  {
    $result = Post::orderBy('id','desc')->get()->toArray();
    return $result;

  }

  public function post(Request $request)
  {
    if ($request['name'] && $request['text']) {
    $name = $request['name'];
    $text = $request['text'];

    $post = new Post();
    $post->name = $name;
    $post->text = $text;
    $post->save();

    return 'success';

  }else{
    return 'failure';
  }

  }

  public function update(Request $request)
  {
    if ($request['id'] && $request['name'] && $request['text']) {
    $id = $request['id'];
    $name = $request['name'];
    $text = $request['text'];

    $post = Post::where('id', $id)->first();
    $post->name = $name;
    $post->text = $text;
    $post->save();

    return 'success';

  }else{
    return 'failure';
  }


  }

  public function delete(Request $request)
  {
      Post::where('id',$request->id)->delete();
      return $request;
  }
}
