@extends('layouts.login')
@section('content')

<!-- 投稿フォームの作成 -->
<!-- route('フォームの送り先') -->

{!! Form::open(['url' => 'post/create']) !!}
<!-- ボタンを押したときのリンク先を設定 -->

{!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
<div>
    <button type="submit">投稿</button>
</div>
{!! Form::close() !!}

<!-- 投稿一覧の表示 -->
<!-- ■投稿された投稿内容を画面に一覧で表示する。
■自分の投稿と自分がフォローしているユーザーの投稿のみ画面に表示する。
■投稿内容には下記を表示する。
・ユーザーアイコン
・ユーザー名
・投稿内容
・投稿日時
・投稿編集ボタン
・投稿削除ボタン -->
<!-- $post とは投稿されたデータの事だから、他でえられたデータを入れる。 -->
<!-- 現状、$postが未定義変数となるエラーが続いている。postscontollorで[post=>$post]したがindexにデータが送られていないっぽい。ここのところを聞く。 -->

<div class="container">
    @foreach ($posts as $post)
    <!-- 複数形as単数形でかくというルール。 前回は($post as $post)だった為、単数と単数、同じ名前だった。-->
    <tr>
        <td>{{ $post->icon }}</td><!-- ユーザーアイコン -->
        <td>{{ $post->user->username }}</td><!-- ユーザー名 -->
        <td>{{$post->post}}</td><!-- ・投稿内容 -->
        <td>{{ $post->created_at }}</td><!-- 投稿日時 -->
        <td><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">更新</a>
        <!-- 更新ボタンの記述モーダル画面が必要。 -->
        <td>
        <td><a href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td><!-- 削除ボタンの記述 -->
    </tr>
　</div>
@endforeach
<!-- モーダルはここに記述する -->
@endsection
