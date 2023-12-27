<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();


//ログアウト中のページ[OK]
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

//[タスク2]新規登録のバリデーション設定で以下の二つのルーティングのメソッド記述を「@added」→「@register」に変更1002→1003変えたせいでaddedページが変なことになってたから直した
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

// ミドルウェア（ログインしていないと見れないようにする）
Route::group(
    ['middleware' => 'auth'],
    function () {
        //ログイン中のページ[OK]
        Route::post('/top', 'PostsController@index');
        Route::get('/top', 'PostsController@index');

        // プロフィール遷移[OK]
        Route::get('/profile', 'UsersController@profile');
        // 他ユーザーのプロフィール[OK]
        Route::get('/users/{id}/profile', 'UsersController@otherProfile');
        // [タスク5-2]ユーザー検索の処理を実装する。検索機能のルーティング[OK]
        Route::get('/search', 'UsersController@search');
        // プロフィールの更新[ok]
        Route::post('/profile/update', 'UsersController@profileUpdate');
        //フォローリスト表示[OK]
        Route::get('/followList', 'FollowsController@followList');
        //フォロワーリスト表示[OK]
        Route::get('/followerList', 'FollowsController@followerList');

        // ログアウト機能[OK]
        Route::get('/logout', 'Auth\LoginController@logout');
        // 投稿フォームの作成（index.bladeとのルーティング）[OK]
        Route::post('/top', 'PostsController@index');
        // 投稿を登録するフォームの作成[OK]
        Route::post('/post/create', 'PostsController@create');
        // 投稿更新処理の記述。[ok]
        Route::post('/post/update', 'PostsController@update');
        // 投稿削除処理の記述[OK]
        Route::get('/post/{id}/delete', 'PostsController@delete');

        //フォローする[OK]
        Route::get('/user/{id}/follow', 'FollowsController@follow')->name('follow');
        //フォロー解除する[OK]
        Route::get('/user/{id}/unfollow', 'FollowsController@unfollow')->name('unfollow');
    }
);
