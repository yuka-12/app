<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class AppController extends Controller
{
    public function index()
    {
        return "hoge";
    }

    public function get()
    {
        return "hoge";
    }

    public function post(Request $request)
    {
        if ($request['name'] && $request['text']) {
            $name = $request['name'];
            $text = $request['text'];

            // $insert = DB::insert(
            //   ['name' => $name], ['text' => $text]
            // );
            // $insert = DB::insert(
            //   'insert into posts (name,text) values (?,?)',[$name,$text]
            // );

            $post = new Post();
            $post->name = $name;
            $post->text = $text;
            $post->save();

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
