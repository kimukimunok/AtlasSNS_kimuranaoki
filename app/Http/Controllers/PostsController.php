<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\users;
use Auth;

class PostsController extends Controller
{
    public function index()
    {
        return view('/index'); //  投稿画面の表示
    }

    // 新規登録
    public function create(Request $request)
    {
        // $user_id = Auth::id();//ログインしているユーザー情報を取得
        // $post = $request->('post');
        // Post::create([
        //     $user_id =>'Auth::id',
        //     $post =>'post_text'
        // ]);

        $post = new Post;
        $post->user_id = Auth::id(); // ログインしているユーザーIDを登録
        $post->post = $request->post;
        $post->save();

        return view('/index'); // 投稿した後一覧画面を表示する
    }
}
