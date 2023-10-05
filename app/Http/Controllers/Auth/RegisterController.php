<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){
        if($request->isMethod('post')){

            // registerメソッド↑紫色メソッドと認識、

            // [タスク2]ユーザー登録時のバリデーションを設定する
//Laravel createの実装のバリデーションの所で ~~Controller.phpに記載していた為ここに記述する。（https://course.lull-inc.co.jp/curriculum/9552/）

            $request->validate([
                'username' => 'required|min:2|max:12|',
                'mail' => 'required|unique:users,mail|email|min:5|max:40',
                'password' => 'required|alpha_num|min:8|max:20|confirmed|',
                'password_confirmation' => 'required|alpha_num|min:8|max:20',
            ]);
// redmine回答、unique関数は、[unique:テーブル名,カラム]と記載する必要があるためatlas_snsと記載していたことが間違いだった。簡易基本設計書を読み、そこに当てはまるテーブル名、カラムを記述したところ改善された。
// メソッドが見つからない事
// confirmedの使い方のミス。フィールドがそのフィールド名＋_confirmationフィールドと同じ値であることをバリデートします。たとえば、バリデーションするフィールドがpasswordであれば、同じ値のpassword_confirmationフィールドが入力に存在していなければなりません。

// [required]入力必須,[min:oo]最低文字数,[max:oo]最高文字数,[email]メール形式（調べたら細かいのあったけど大丈夫そう）,[unique:テーブル名,カラム]指定したデータベース内で独立したもの,[alpha_num]英数字のみ,[{指定した文字列}_confirmed]指定した文字列と同じか,
 // atlas_snsにはmailテーブルが無かったため一旦スルー/10/2

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

// [タスク1-3]セッション機能を使用して新規登録ユーザー名を表示させる。
// 指定したデータをセッションから取得する。→$requestの中のusernameのセッションを受け取る。
// 値に名前を付けてセッションに保存する方法↓
// session()->put('セッションに入れる値の名前', セッションに入れる値);

// 1003スクール後、値を保存、取り出しを行うということの認識を見直し、記述を追加したら新規登録時のユーザー名が表示された。
// 値を保存する記述を記載↓($usernameの値をusernameセッションに入れているという認識)
// session()->put('セッションに入れる値の名前', セッションに入れる値);
            $value = $request->session()->put('username',$username);
            // ddd($value);
// 値を取得する記述を記載↓(保存したusernameを取り出す感じ)
            $$value = $request->session()->get('username');

// ↓addedページにセッションの値を送る。
             return redirect('added');

        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');

    }

}
