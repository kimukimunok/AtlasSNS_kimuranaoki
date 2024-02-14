<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //登録処理の実行
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $fillable = ['post','user_id'];
    // 一対多の保護、postが多数、user_idが一つ
}
// 確認ok
