<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //1010　登録処理の実行

    public function user()
    {
        return $this->belongsTo('App\User');
        // belongsToは従テーブルの複数レコードに対して、主テーブルの1つのレコードが紐付けるときに用いられる。「多対１つ」の関係性
        // 子テーブル(多数の投稿)から親テーブル(唯一のユーザー)に対してIDなどのレコードを取得する。
    }

    protected $fillable = ['user_id','post']; //追加のカラムを複数代入保護の為の指定

}
