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
    $result = Post::all();
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
      //$companies = \DB::table('companies')->get();
      //return view('index')->with('companies',$companies);
      return "hoge";
  }
  public function delete()
  {
      //$companies = \DB::table('companies')->get();
      //return view('index')->with('companies',$companies);
      return "hoge";
  }
}
