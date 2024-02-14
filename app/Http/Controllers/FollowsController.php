<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class FollowsController extends Controller
{
    // フォローリスト
    public function followList()
    {
        $follows = Auth::user()->follow()->get();

        $following_id = Auth::user()->follow()->pluck('followed_id');
        $posts = Post::whereIn('user_id', $following_id)->orderBy('created_at', 'desc')->get();
        return view('follows.followList', [
            'posts' => $posts,
            'follows' => $follows
        ]);
    }
    // フォロワーリストを表示
    public function followerList()
    {
        $followers = Auth::user()->follower()->get();
        $followed_id = Auth::user()->follower()->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id', $followed_id)->orderBy('created_at', 'desc')->get();
        return view('follows.followerList', [
            'posts' => $posts,
            'followers' => $followers
        ]);
    }
    // フォローボタン、アンフォローボタン
    public function follow($id)
    {
        $users = Auth::user();
        $isFollowing = $users->isFollowing($id);
        if (!$isFollowing) {
            $users->follow()->attach($id);
            return back();
        }
    }
    public function unfollow($id)
    {
        $users = Auth::user();
        $isFollowing = $users->isFollowing($id);
        if ($isFollowing) {
            $users->follow()->detach($id);
            return back();
        }
    }
}
// ok
