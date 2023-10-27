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
<div class="container">
    @foreach ($post as $post)
    <tr>
        <td>{{ $post->icon }}</td><!-- ユーザーアイコン -->
        <td>{{ $post->user->username }}</td><!-- ユーザー名 -->
        <td>{{$post->post}}</td><!-- ・投稿内容 -->
        <td>{{ $post->created_at }}</td><!-- 投稿日時 -->
        <td><a class="btn btn-primary" href="post={{$post->id}}/update-form">更新</a></td><!-- 更新ボタンの記述 -->
        <td><a class="btn btn-danger" href="/post/{{post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td><!-- 削除ボタンの記述 -->
    </tr>
    @endforeach
</div>


@endsection


<!-- createの実装のヒント
ログインしているユーザーのIDが入ることを指示する。
後はフォームファサードの正しいname属性の記述、根本からかな。
あとはコントローラーで指定した先へとデータを送れているかデバッグ関数使いながらやる。 -->
