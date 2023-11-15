<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public function post()
    {
        return $this->hasMany('App\Post');
    }
// 1対多のリレーション

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

// 次はここから記入箇所！！！
    protected $hidden = [
        'password', 'remember_token',
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
        return $this->follow()->where('followed_id', $id)->exists();
    }
}
