<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller{
    public function index(){
        //変数$postsをテーブルpostsから取得する
        $posts = DB::table('posts')->get();

        return view('posts/index',compact('posts'));
    }

    public function show($id){
        $post =Post::find($id);
        return view('posts.show',compact('post'));
    }

}
