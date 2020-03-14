<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    
    public function userContact(){
        return view('contact');
    }
    public function aboutUs(){
        return view('about');
    }
    public function userBlog(){
        return view('blog');
    }

    public function index(){

        $post= DB::table('posts')
        ->join('categories','posts.category_id','categories.id')
        ->select('posts.*', 'categories.name','categories.slug')->paginate(2);

        return view('index',compact('post'));

    }


}
