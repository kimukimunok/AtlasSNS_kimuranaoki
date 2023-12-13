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


//ログアウト中のページ

Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

//[タスク2]新規登録のバリデーション設定で以下の二つのルーティングのメソッド記述を「@added」→「@register」に変更1002→1003変えたせいでaddedページが変なことになってたから直した
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::post('/top', 'PostsController@index')->middleware('auth');
Route::get('/top', 'PostsController@index')->middleware('auth');

Route::get('/profile', 'UserController@profile');
Route::get('/search', 'UsersController@index');

Route::get('/follow-list', 'PostsController@index');
Route::get('/follower-list', 'PostsController@index');

// ログアウト機能のルーティング
Route::get('/logout', 'Auth\LoginController@logout');
// /logoutに変更(logoutメソッドを使用する為)

// 投稿フォームの作成（index.bladeとのルーティング）
Route::post('/top', 'PostsController@index');

// 投稿を登録するフォームの作成
Route::post('/post/create', 'PostsController@create');
// 投稿更新処理の記述。
Route::get('/post/update', 'PostsController@update');
// 投稿削除処理の記述
Route::get('/post/{id}/delete', 'PostsController@delete');

// [タスク5-2]ユーザー検索の処理を実装する。検索機能のルーティング
Route::post('/search', 'UsersController@search');  //検索ページ
Route::get('/search', 'UsersController@search');  //検索ページ

//他ユーザーをフォローする
Route::get('/user/{id}/search', 'FollowsController@follow')->name('follow');
Route::post('/user/{id}/search', 'FollowsController@follow')->name('follow');

//他ユーザーをフォロー解除する
Route::get('/user/{id}/search', 'FollowsController@unfollow')->name('search');
Route::post('/user/{id}/search', 'FollowsController@unfollow')->name('search');

//フォローリスト表示
Route::get('/followList', 'FollowsController@followList');
// 復習FollowsControllerのfollowListメソッドを実行
//フォロワーリスト表示
Route::get('/followerList', 'FollowsController@followerList');

//プロフィール遷移先
Route::get('/userprofile', 'UsersController@userprofile');
