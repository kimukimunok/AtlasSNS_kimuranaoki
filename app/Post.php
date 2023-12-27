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
    // リレーション(データベース上のテーブルを関連付ける物)
    //データを受け取りたり、テーブル情報を更新する自動で反映される。
    // 参考サイト：https://biz.addisteria.com/laravel_relation/
    protected $fillable = ['post','user_id'];
    // 一対多の保護postが多数、user_idが一つ
}
// ok
