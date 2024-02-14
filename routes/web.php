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

Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

// ミドルウェア
Route::group(
    ['middleware' => 'auth'],
    function () {
        //ログイン中のページ
        Route::post('/top', 'PostsController@index');
        Route::get('/top', 'PostsController@index');
        // プロフィール遷移
        Route::get('/profile', 'UsersController@profile');
        // 他ユーザーのプロフィール
        Route::get('/users/{id}/profile', 'UsersController@otherProfile');
        // ユーザー検索処理
        Route::get('/search', 'UsersController@search');
        // プロフィールの更新
        Route::post('/profile/update', 'UsersController@profileUpdate');
        //フォローリスト表示
        Route::get('/followList', 'FollowsController@followList');
        //フォロワーリスト表示
        Route::get('/followerList', 'FollowsController@followerList');
        // ログアウト機能
        Route::get('/logout', 'Auth\LoginController@logout');
        // 投稿フォームの作成
        Route::post('/top', 'PostsController@index');
        // 投稿を登録するフォームの作成
        Route::post('/post/create', 'PostsController@create');
        // 投稿更新処理の記述。
        Route::post('/post/update', 'PostsController@update');
        // 投稿削除処理の記述
        Route::get('/post/{id}/delete', 'PostsController@delete');
        //フォロー
        Route::get('/user/{id}/follow', 'FollowsController@follow')->name('follow');
        //フォロー解除
        Route::get('/user/{id}/unfollow', 'FollowsController@unfollow')->name('unfollow');
    }
);
