<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){
        // $post=Post::get();
        $post = Post::orderBy('created_at','desc');//orderByで並び順を時間で編集された順にしている。
        return view('posts.index', ['post'=> $post]); //  投稿画面の表示
    }

    // 投稿する機能
    public function create(Request $request)
    {
    //     if(auth::check()){
    //         dd("ログイン成功");
    //     }else{
    //         dd("ログイン失敗");
    //     }

        $post = $request->input('newPost');
        Post::create([
            'post' => $post,          //送ったpost投稿を取得
            'user_id' => Auth::user()->id,  //ログインしているユーザーIDを取得
            // http://taustation.com/laravel-login-user-acquisition/調べたサイト
        ]);
        return view('posts.index'); // 投稿した後一覧画面を表示する
    }
    // 投稿の編集機能update
    public function update(Request $request)
    {
        $id = $request->input('id'); // ユーザーのid情報を受け取っている
        // dd($id);→1019ヌルだった。
        $up_post = $request->input('upPost');
        \DB::table('posts') // データベースポストテーブルの指定。
        ->where('id', $id) // どこのidのユーザーか定数ではなく変数の「$id」
        ->update([
            'post' => $up_post //ポストを更新する為の記載。
        ]);
        return view('posts.index');
    }
    // 投稿の削除機能delete
    // DELETEメソッドでリクエスト。posts.deleteルートでPostsControllerのdestroyアクションを実行→destroyアクションで指定されたデータを削除
    public function delete( Post $post)
    {
        \DB::table('posts', $post)->delete();
        return redirect('?top');
    }

}
