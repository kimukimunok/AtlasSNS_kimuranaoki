@extends('layouts.login')
<!-- 投稿フォームの作成 -->
@section('content')

<!-- ルーティング -->
{!! Form::open(['url' => 'post/create']) !!}
<!-- バリデーションエラーメッセージ -->
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
<div class="form-container">
    <img class="auth-icon" src="{{ \Storage::url(Auth::user()->images) }}" alt="アイコン" width="50">
    {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
    <div class="form-btn-container">
        <button input="submit" class="post-btn" href>
            <img class="btn-success" src="images/post.png" alt="送信">
        </button>
    </div>
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
@foreach ($posts as $post)
<div class="post-container">
    <div class="post-content">
        <div>
            <ul class="post-flex">
                <div>
                    <!-- アイコンを表示する。 -->
                    <img src="{{ asset('storage/' .$post->user->images) }}" alt="アイコン" width="40">
                </div>
                <!-- ユーザー名と投稿日を表示する -->
                <li class="post-username">{{$post->user->username}}</li>
                <li class="post-time">{{$post->created_at}}</li>
            </ul>
        </div>
        <ul>
            <!-- 変数を表示させるためにn12brを使っている。 -->
             <li class="post-detail">{!! nl2br(e($post->post)) !!}</li>
        </ul>
        <!-- ログインユーザーと投稿したユーザーがあってれば -->
        @if(Auth::user()->id == $post->user->id)
        <!-- 投稿編集機能 -->
        <div class="modal-container">
            <!-- モーダル画面で変種を行い、投稿とidを新しくする・ -->
            <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
                <img src="images/edit.png" alt="編集" width="30"></a>
            <!-- 投稿削除 -->
            <a class="post-delete" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                <img class="delete" src="images/trash.png" alt="削除">
                <!-- <img class="delete-hover" src="images/trash.png" alt="ホバー"> -->
            </a>
        </div>
        @endif
    </div>
</div>
@endforeach
<!-- モーダル -->
<div class="modal js-modal">
    <div class="modal_bg js-modal-close"> </div>
    <div class="modal_content">
        <form action="/post/update" method="post">
            <!-- valueの値を入れないのは見えない状態でpostIdを送る為 -->
            <textarea name="upPost" class="modal_post" value=""></textarea>
            <input type="hidden" name="postId" class="modal_id" value="">
            <div class="postUpdate_container">
                <img class="postUpdate_img" src="images?edit.png" alt="編集" width="40">
                <input class="btn-post_update" type="submit" value="更新">
            </div>
            {{ csrf_field() }}
        </form>
        <a class="Js-modal-close" href=""></a>
    </div>
</div>
@endsection
