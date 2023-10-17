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


<!-- <form action="/index" method="post">
    <textarea name="main" cols="30" rows="5" placeholder="投稿内容を入力してください。"></textarea>
    <button type="submit" value="投稿する">投稿する</button>
</form>-->
@endsection


<!-- createの実装のヒント
ログインしているユーザーのIDが入ることを指示する。
後はフォームファサードの正しいname属性の記述、根本からかな。
あとはコントローラーで指定した先へとデータを送れているかデバッグ関数使いながらやる。 -->
