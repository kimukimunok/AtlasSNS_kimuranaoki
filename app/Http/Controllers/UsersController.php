<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
// プロフィール内の処理
{
    public function userprofile(Request $request)
    {
        $users = Auth::user(); //ログインしているユーザーを取得
        return view('users.userprofile', compact('users'));
    }




    // [タスク5-2]ユーザー検索の処理を実装する。で下のsearchメソッドを使用
    public function search(Request $request)
    {
        // $keywordの定義、$requestの中から検索したものがkeyword
        // クエリビルダを使って($query=)でデータテーブルを指定する。
        // １ログインしているユーザーを取得しなければならない。
        $keyword = $request->input('keyword'); //検索したいキーワードを取得
        $user = Auth::user(); //ログインしているユーザーを取得
        $query = \DB::table('users'); //usersテーブルを取得
        // (参考サイトhttps://qiita.com/Sushi29/items/8e2e5853aef8bb2fb091)
        //条件分岐　keywordが入力されたとき。
        if (!empty($keyword)) { //もしキーワードがある場合
            $query->where('username', 'LIKE', "%({$keyword}%") //カラムから名前のキーワードをあいまい検索で取得する。
                ->where('id', '!=', Auth::user()->id); //自分以外を表示させる記述（参考サイト:https://zenn.dev/shimotaroo/scraps/bd5865bf3d6aeb）にて「!=」の記述で「ではない、以外」を示している。自分以外のログインしているユーザーの様な意味
            $users = $query->get(); //usersテーブルから取得している。
            return view('users.search', ['keyword' => $keyword, 'users' => $users]);
        } else { //キーワードが無いとき。
            $query //usersテーブルの代わりとして使っている。
                ->where('id', '!=', Auth::user()->id);
            $users = $query->get(); //usersテーブルから取得している。
            return view('users.search', ['keyword' => $keyword, 'users' => $users]);
        };

        // keywordの記述で検索語にkeywordを表示させる。
    }

    //use Illuminate\Support\Facades\Auth; の記述をしたらフォローボタンがエラーになったから、（バリデーションが無いからエラーみたいなやつ）followscontollerに移動した。

}
