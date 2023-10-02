<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AtlasSns extends Migration



{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//upメソッドは、作りたいテーブルの名前とカラム構造を設定する。
// [schema]スキーマ＝何かのデータベースの構造という意味
        Schema::create('atlas_sns', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('following_id');
            $table->integer('followed_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//  downメソッドはatlassnsテーブルが削除されるという文を追加、不要になった時コマンド一つで対応できる。
// [schema]スキーマ＝何かのデータベースの構造という意味
        Schema::drop('atlas_sns');
    }
}
