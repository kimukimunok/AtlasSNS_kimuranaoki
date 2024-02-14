<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

// 投稿画面一覧の表示
class PostsController extends Controller
{
    public function index()
    {
        // フォローしている人のIDを取得
        $following_id = Auth::user()->follow()->pluck('followed_id');
        // フォローしている人と自分(ログインユーザーの投稿を表示する)
        $posts = Post::whereIn('user_id', $following_id)->orWhere('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
    }
    public function create(Request $request)
    {
        // バリデーション
        $request->validate([
            'newPost' => 'required|max:150|min:1'
        ]);

        $user_id = Auth::id();
        $posts = $request->input('newPost');
        Post::create([
            'user_id' => $user_id,
            'post' => $posts,
        ]);
        return redirect('/top');
    }
    // 投稿の編集機能update
    public function update(Request $request)
    {
        $request->validate([
            'upPost' => 'required|max:150|min:1'
        ]);

        $id = $request->input('postId');
        $up_post = $request->input('upPost');
        Post::where('id', $id)->update([
            'post' => $up_post,
        ]);
        return redirect('/top');
    }
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
