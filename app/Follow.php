<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['following_id', 'followed_id'];
    //追加のカラムを複数代入保護の為の指定
}
