<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;


class UsersController extends Controller



// プロフィール内の処理
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //プロフィール
    public function profile()
    {
        return view('users.profile');
    }

    // ユーザープロフィールの更新まだ！！！
    public function profileUpdate(Request $request)
    {
        // ログインユーザーのみ
        $user = Auth::user();
        // バリデーション
        $request->validate([
            'username' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255|unique:users,mail,' . $user->id . 'id',
            'bio' => 'nullable|string|max:150',
            'password' => 'alpha_num|min:8|max:20|confirmed',
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ]);
        // 更新内容
        // $user->update([
        //     'username' => $request->input('username'),
        //     'mail' => $request->input('mail'),
        //     'bio' => $request->input('bio')
        // ]);
        // // 画像の更新
        // // ($request->file('image')->isValid())
        // if ($request->hasFile('image') && $request->file('image')->isValid()) {
        //     $image = $request->file('image');
        //     $request->file('image')->storeAs('public', $image);
        //     // ユーザーテーブルの画像カラムの更新
        //     $user->update(['images' => $image]);
        // }
        // //値が無い時は更新しない。
        // else {
        //     $image = $user->images;
        //     $user->update(['images' => $image]);
        // }
        // 画像更新候補
        //↓画像の更新↓
        //getClientOrignalNameでオリジナルの名前が取れる
        //storeAsメソッドを追加して引数に入れた上で、保存場所と変数名を指定する
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $img = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $img);
            // dd($img);
            // 更新画像送れている。だが表示されない。（容量の問題？）
            //usersテーブルのimagesカラムの更新
            $user->update(['images' => $img]);
        } else {
            //空の場合はデフォルトを維持する
            $img = $user->images;
            //元の値を再度保存
            $user->update(['images' => $img]);
        }
        dd($user);



        // パスワードの更新時
        // パスワードとパスワード確認用がどちらも記述があったら更新する。
        if ($request->has('password')) {
            if ($request->filled('password')) {
                $user->password = bcrypt($request->input('password'));
            }
            //値が無いときは更新しない。
            else {
                $password = $user->password;
                $user->password = $password;
            }
        }
        // 保存更新
        $user->save();
        return redirect('/top');
    }

    // 画像ファイルをアップロード（更新）する



    // 他のユーザーのプロフィール
    public function otherProfile($id)
    {
        $posts = Post::where('user_id', $id)->get();
        $profile = User::where('id', $id)->get();
        return view('users.otherprofile', [
            'profile' => $profile,
            'posts' => $posts
        ]);
    }

    // [タスク5-2]ユーザー検索の処理を実装する。で下のsearchメソッドを使用
    public function search(Request $request)
    {
        // クエリビルダを使って($query=)でデータテーブルを指定する。
        $query = User::query();
        // $keywordの定義、$requestの中から検索したものがkeyword
        $keyword = $request->input('keyword'); //検索したいキーワードを取得
        //条件分岐　keywordが入力されたとき。
        if (!empty($keyword)) {
            $query->where('username', 'like', '%' . $keyword . '%')->where('id', '!=', Auth::id())->get();
            //自分以外を表示させる記述（参考サイト:https://zenn.dev/shimotaroo/scraps/bd5865bf3d6aeb）にて「!=」の記述で「ではない、以外」を示している。自分以外のログインしているユーザーの様な意味
            $users = $query->get(); //usersテーブルから取得している。
            return view('users.search', [
                'users' => $users,
                'keyword' => $keyword
            ]);
            // 検索ワードが無いとき
        } else {
            $users = User::where('id', '!=', Auth::id())->get();
            return view('users.search', ['users' => $users]);
        }
    }
}
// プロフィールの更新まだ
