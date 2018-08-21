<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Response;
use App\Http\Requests;
// use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Post;
// use Response;

class AppController extends Controller
{

  public function get()
  {
    $result = Post::orderBy('id','desc')->get();
    return $result->toArray();

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
    return 'FAIL TO AJAX REQUEST';
  }

  }

  public function update()
  {

    $result = Post::paginate(10);
      //$companies = \DB::table('companies')->get();
      //return view('index')->with('companies',$companies);
      // $a = new Response();
      // dd($a);
      return response()->json($result);
  }
  public function delete(Request $request)
  {
      Post::where('id',$request->id)->delete();
      return $request;
  }
}
