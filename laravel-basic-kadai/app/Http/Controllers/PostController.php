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

    public function create() {
        return view('posts/create');
    }

    public function store(Request $request){
        // バリデーションを設定
        $request->validate([
            'title'=>'required|max:20',
            'content'=>'required|max:200'
        ]);

        // ボタンが押されたら入力値をポストテーブルに保存する
        $posts = new Post();
        $posts->title = $request->input('title');
        $posts->content = $request->input('content');
        $posts->save();

        // リダイレクト
        return redirect("/posts");
    }

}
