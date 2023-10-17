<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index'); //  投稿画面の表示
    }

    // 投稿機能
    public function create(Request $request)
    {
        // $user_id = dd(Auth::id()); //ログインしているユーザー情報を取得
        // \Auth::user()->id;
        // $id = Auth()->id();
        // dump($user_id);
        // $id = Post::where('user_id', \Auth::user()->id)->get();
        // 何も送れていない。
        $post = $request->input('newPost');
        // dump($post);
        // 投稿は送れている。
        dd($id);
        Post::create([
            'post' => $post,          //送ったpost投稿を取得
            'user_id' => Auth::user()->id,  //ログインしているユーザーIDを取得
            // http://taustation.com/laravel-login-user-acquisition/
        ]);


        // $post = new Post;
        // $post->user_id = Auth::id(); // ログインしているユーザーIDを登録
        // $post->post = $request->post;
        // $post->save();

        return view('posts.index'); // 投稿した後一覧画面を表示する
    }
}
