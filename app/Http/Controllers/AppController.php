<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
  public function index()
  {
      return "hoge";
  }

  public function post($request)
  {
    
    if(isset($request['name']) && isset($request['text'])){
    $name = $request['name'];
    $text = $request['text'];
    $str = "AJAX REQUEST SUCCESS\nname:".$name."\ntext:".$text."\n";
    $result = nl2br($str);
    return $result;

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
