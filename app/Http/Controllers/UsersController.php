<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    // [タスク5-2]ユーザー検索の処理を実装する。で下のsearchメソッドを使用
    public function search(Request $request){

        //[タスク5-3]検索後に検索ワードを画面に表示する。ここから初める。
        // $keywordの定義、$requestの中から検索したものがkeyword
        $keyword = $request->input('keyword');
          //keyword(検索フォームの値が)が入力されたとき。
        if(!empty($keyword)){
            // $() = テーブル名usersのusernameカラムからあいまい検索でヒットしたレコード情報を取得
            $username = Users::where('username', 'like', '%' . $keyword . '%');
        }else{
            // $() = もしくは何も入力しなかった場合、usersテーブルの全てを表示する。
            $username = Users::all();
        }
        // url(usersのsearchページ)を指定して、検索を画面表示する
        return view('users.search',['users'=>$username]);
    }
}
