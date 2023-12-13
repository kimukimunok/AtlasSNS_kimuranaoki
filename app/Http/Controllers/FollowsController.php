<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;

class FollowsController extends Controller

{
    //pluck＝コレクションメソッド、指定したその一つを取得する。
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
        // dd($following_id);
        // フォローしているユーザーのidを元に投稿内容を取得(参考②のヒントみる)
        $posts = Post::with('user')->whereIn('follows', $following_id)->get();
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
        $posts = Post::with('user')->whereIn('follows', $followed_id)->get();
        return view('follows.followerList', [
            'posts' => $posts,
            'followers' => $followers
        ]);
    }
    // フォローボタン、アンフォローボタン
    // followデータベースに登録処理(followする)と解除(unfollowする)を行う処理を調べる。
    // ログインしているユーザーが～フォローする。という記述の為、Auth::userつかう。
    // レコードを追加する[atach]削除する[detach]

    public function follow($id)
    {
        $users = Auth::user();
        $isFollowing = $users->isFollowing($id);
        if (!$isFollowing) {
            $users->follow()->atach($id);
            return back();
        }
        // もしログインしているユーザーがフォローを行ったらレコードを追加する。（フォローする）

    }
    public function unfollow($id)
    {
        $users = Auth::user();
        $isFollowing = $users->isFollowing($id);
        if (!$isFollowing) {
            $users->follow()->detach($id);
            return view('users.search');
        }
        // もしログインしているユーザーがフォローを解除したらレコードを削除する。（フォローを外す）
    }

    // ボタンを押したとき、リンク先が変更できないからここから始める。
}
