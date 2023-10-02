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

            // [タスク2]ユーザー登録時のバリデーションを設定する
//Laravel createの実装のバリデーションの所で ~~Controller.phpに記載していた為ここに記述する。（https://course.lull-inc.co.jp/curriculum/9552/）

            $request->validate([
                'username' => 'required|min:2|max:12|',
                'mail' => 'required|unique:atlas_sns|email|min:5|max:40',
            // atlas_snsにはmailテーブルが無かったため一旦スルー/10/2
                'password' => 'required|alpha_num|min:8|max:20|',
                'password_confirmation' => 'required|alpha_num|password_confirmed||min:8|max:20',
            ]);

// [required]入力必須,[min:oo]最低文字数,[max:oo]最高文字数,[email]メール形式（調べたら細かいのあったけど大丈夫そう）,[unique:テーブル名,カラム]指定したデータベース内で独立したもの,[alpha_num]英数字のみ,[{指定した文字列}_confirmed]指定した文字列と同じか,

            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);

            return redirect('added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
