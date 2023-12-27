<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // リレーション(データベース上のテーブルを関連付ける物)
    // アクセス修飾子protected.自クラスと子クラスからのアクセスを可能にするようにする。
    protected $fillable = [
        'username', 'mail', 'password', 'bio', 'images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // hidden[データを取得しないもの]
    // remember_token[ログイン情報を保持するもの]
    protected $hidden = [
        'password', 'remember_token',
        // パスワード、とログイン状態保持　すること、この二つを取得しないようにすることを行っている。
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
        // リレーション箇所、投稿は多数ある関係の為、[hasmany]を使用

    }
    //フォローする
    public function follow()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
        // 並びは,フォローする相手のクラス、中間のテーブル、自分のカラム、フォローする相手のカラム
    }
    //フォローされる
    public function follower()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
        // 並びはフォローする相手のクラス、中間のテーブル、フォローする相手のカラム、自分のカラム
    }
    // フォローしているかどうかを確かめる。
    public function isFollowing($id)
    {
        return $this->follow()->where('followed_id', $id)->exists();
        // exists＝存在を確かめるもの
    }
}
// ok
