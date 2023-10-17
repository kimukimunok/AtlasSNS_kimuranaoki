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

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

//[タスク2]新規登録のバリデーション設定で以下の二つのルーティングのメソッド記述を「@added」→「@register」に変更1002→1003変えたせいでaddedページが変なことになってたから直した
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::post('/top', 'PostsController@index');
Route::get('/top', 'PostsController@index');

Route::get('/profile', 'UserController@profile');
Route::get('/search', 'UsersController@index');

Route::get('/follow-list', 'PostsController@index');
Route::get('/follower-list', 'PostsController@index');

// ログアウト機能のルーティング
Route::get('/logout', 'Auth\LoginController@logout');
// /logoutに変更(logoutメソッドを使用する為)

// 投稿フォームの作成（index.bladeとのルーティング）
Route::post('/posts/index', 'PostsController@index');

// 投稿を登録するフォームの作成
Route::post('/posts/index', 'PostsController@create');

// [タスク5-2]ユーザー検索の処理を実装する。検索機能のルーティング
Route::post('/search', 'UsersController@search');
