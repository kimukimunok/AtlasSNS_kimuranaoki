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
    // フォローしているかどうかを確かめる。
    public function isFollowing($id)
    {
        return $this->follow()->where('followed_id', $id)->exists();
    }
}
// 確認ok
