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
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', ['posts' => $posts]);
    }
    public function create(Request $request)
    {
        $post = $request->input('newPost');
        Post::create([
            'user_id' => Auth::user()->id,
            'post' => $post,
        ]);

        return redirect('/top');
    }
    // 投稿の編集機能update
    public function update(Request $request)
    {
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
