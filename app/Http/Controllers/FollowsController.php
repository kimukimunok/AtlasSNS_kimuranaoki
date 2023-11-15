<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList()
    { // フォローリストを表示する処理
        // ログインしているユーザーが、フォローしているユーザー情報の取得↓
        $follows = Auth::user()->follow()->get();
        // ログインしているユーザーが、フォローしているユーザー情報(id)の取得↓
        $following_id = Auth::user()->follows()->pluck(' followed_id ');
        // フォローしているユーザーのidを元に投稿内容を取得(参考②のヒントみる)
        $posts = Post::with('user')->whereIn(' followed_id ', $following_id)->get();
        return view('follows.followList',[
            // 投稿数とフォローしている人数の情報を出す
            // 複数出す必要がある為[s]複数形にして記述している
        'posts'=> $posts,
        'follows'=>$follows
        ]);
    }

    public function followerList()
    { // フォロワーリストを表示する処理
        // ログインしているユーザーフォロワー情報の取得↓
        $followers = Auth::user()->follower()->get();
        // ログインしているユーザーフォロワー情報(id)の取得↓
        $followed_id = Auth::user()->follows()->pluck(' $following_id ');
        // フォロワーのidを元に投稿内容を取得(参考②のヒントみる)
        $posts = Post::with('user')->whereIn(' following_id ', $followed_id)->get();
        return view('follows.followerList',[
            // 投稿数とフォローしている人数の情報を出す
            // 複数出す必要がある為[s]複数形にして記述している
        'posts'=> $posts,
        'followers'=>$followers
        ]);
    }
}
