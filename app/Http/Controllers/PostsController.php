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
        //orderByで並び順を登録されたのが新しい順にしている。
        // dd($post);←1101データ確認ok
        return view('posts.index', ['posts' => $posts]); //  投稿画面の表示
    }
    // ['post'=> $post]でindex.bladeにデータを送っている。
    // ['渡す先での変数名' => 今回渡す変数]
    // 投稿する機能
    public function create(Request $request)
    {
        // バリデーション
        // $request->validate(['post' => 'required|max:150|min|1',]);

        //     if(auth::check()){
        //         dd("ログイン成功");
        //     }else{
        //         dd("ログイン失敗");
        //     }
        $post = $request->input('newPost');
        // dd($post);
        Post::create([
            'user_id' => Auth::user()->id, //ログインしているユーザーIDを取得
            'post' => $post,

            //送ったpost投稿を取得
            // http://taustation.com/laravel-login-user-acquisition/調べたサイト
        ]);

        return redirect('/top'); // 投稿した後一覧画面を表示する
    }

    // 投稿の編集機能update
    public function update(Request $request)
    {
        $id = $request->input('id'); // ユーザーのid情報を受け取っている
        $up_post = $request->input('upPost');
        Post::where('id', $id)->update([
            'post' => $up_post,
        ]);
        return redirect('/top');
    }
    // 投稿の削除機能delete
    // DELETEメソッドでリクエスト。posts.deleteルートでPostsControllerのdestroyアクションを実行→destroyアクションで指定されたデータを削除
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
// ok
