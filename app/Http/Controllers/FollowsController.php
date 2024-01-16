<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class FollowsController extends Controller

{
    // フォローリストを表示する処理
    // 11/22質問
    public function followList()
    {
        // ログインしているユーザーが、フォローしているユーザー情報の取得↓
        // 11/23follows()からfollow()に変更
        $follows = Auth::user()->follow()->get();
        // dd($follows);
        // ログインしているユーザーが、フォローしているユーザー情報(id)の取得↓
        $following_id = Auth::user()->follow()->pluck('followed_id');
        // pluck=指定した一つを取得する。
        // dd($following_id);
        // フォローしているユーザーのidを元に投稿内容を取得(参考②のヒントみる)

        // ミス記述$posts = Post::with('user')->whereIn('follows', $following_id)->get();
        $posts = Post::whereIn('user_id', $following_id)->orderBy('created_at', 'desc')->get();
        // orderbyメソッド（並べ替えメソッド）desc=長い順、大きい順（上の場合作られた順で表示される。）
        return view('follows.followList', [
            // 投稿数とフォローしている人数の情報を出す
            // 複数出す必要がある為[s]複数形にして記述している
            'posts' => $posts,
            'follows' => $follows
        ]);
    }

    // フォロワーリストを表示する処理
    public function followerList()
    {
        // ログインしているユーザーフォロワー情報の取得↓
        $followers = Auth::user()->follower()->get();
        // ログインしているユーザーフォロワー情報(id)の取得↓
        $followed_id = Auth::user()->follower()->pluck('following_id');
        // フォロワーのidを元に投稿内容を取得(参考②のヒントみる)
        $posts = Post::with('user')->whereIn('user_id', $followed_id)->orderBy('created_at', 'desc')->get();
        // 上の->get();の記述忘れでフォロワーの投稿が表示されてなかった。
        return view('follows.followerList', [
            'posts' => $posts,
            'followers' => $followers
        ]);
    }
    // フォローボタン、アンフォローボタン
    // followデータベースに登録処理(followする)と解除(unfollowする)を行う処理を調べる。
    // ログインしているユーザーが～フォローする。という記述の為、Auth::userつかう。
    // レコードを追加する[attach]削除する[detach]

    public function follow($id)
    {
        $users = Auth::user();
        $isFollowing = $users->isFollowing($id);
        if (!$isFollowing) {
            $users->follow()->attach($id);
            return back();
        }
        // もしログインしているユーザーがフォローを行ったらレコードを追加する。（フォローする）

    }
    public function unfollow($id)
    {
        $users = Auth::user();
        $isFollowing = $users->isFollowing($id);
        if ($isFollowing) {
            $users->follow()->detach($id);
            return back();
        }
        // もしログインしているユーザーがフォローを解除したらレコードを削除する。（フォローを外す）
    }

    // ボタンを押したとき、リンク先が変更できないからここから始める。
}
// ok
