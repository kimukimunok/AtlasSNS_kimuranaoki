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
    protected $fillable = [
        'username', 'mail', 'password', 'bio', 'images',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // パスワード情報とログインを維持しないようにする
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    //フォローする
    public function follow()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }
    //フォローされる
    public function follower()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }
    // https://qiita.com/topdownreading/items/5f451da460c39d0631d1

    // フォローしているかどうかを確かめる。
    public function isFollowing($id)
    {
        return $this->follow()->where('followed_id', $id)->exists();
        // https://readouble.com/laravel/8.x/ja/validation.html#rule-exists
        // exists→データベース内にフィールドが存在するか確認できる（今回の場合はfollowed_idの中に$idがあるか確認している。）
    }
// https://teratail.com/questions/253142
}
// 確認ok
