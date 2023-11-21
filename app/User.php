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
    // アクセス修飾子protected.自クラスと子クラスからのアクセスを可能にするようにする。
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

// 次はここから記入箇所！！！
// hidden[データを取得しないもの]
// remember_token[ログイン情報を保持するもの]
    protected $hidden = [
        'password', 'remember_token',
        // パスワード、とログイン状態保持　すること、この二つを取得しないようにする。
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
        // リレーション箇所、投稿は多の関係の為、[hasmany]を使用

    }
    public function follow()
    {
        //①相手のクラス②中間テーブル③自分のカラム④相手のカラム
        //フォローする動き
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
        // 並びはフォローする相手のクラス、中間のテーブル、自分のカラム、フォローする相手のカラム
    }
    public function follower()
    {
        //フォローされる動き
        return $this->belongsToMany('App\User','follows','followed_id','following_id');
        // 並びはフォローする相手のクラス、中間のテーブル、フォローする相手のカラム、自分のカラム
    }
    public function following($id)
    {
        // フォローしているかどうかを確かめる。
        return $this->follow()->where('followed_id', $id)->exists();
        // exists＝存在を確かめるもの
    }
}
