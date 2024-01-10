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
                <!-- ユーザー名-->
                <li class="post-username">{{$post->user->username}}</li>
                <!-- 投稿日時 -->
                <li class="post-time">{{$post->created_at}}</li>
            </ul>
        </div>
        <ul>
            <!-- nl2br＝組み込み関数(文章前に改行する機能) -->
            <li class="post-detail">{!! nl2br(e($post->post)) !!}</li>
        </ul>
        <!-- if文、ログインユーザーと投稿したユーザーがあってれば -->
        @if(Auth::user()->id == $post->user->id)

        <!-- 投稿編集機能 -->
        <div class="modal-container">
            <!-- モーダル画面で編集を行い、投稿とidを新しくする・ -->
            <!-- こんな感じに表示される。<a class="js-modal-open" href="" post="検証"(投稿内容) post_id="42"(投稿ID)> -->
            <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
                <img src="images/edit.png" alt="編集" ></a>
                <!-- width=30消してる後で戻す。 -->

            <!-- 投稿削除 -->
            <a class="post-delete" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                <img class="delete" src="images/trash.png" alt="削除">
            </a>
        </div>
        @endif
    </div>
</div>
@endforeach
<!-- モーダル ここが出てない。→CSSで画面から消して、ボタン操作で表示させる。-->
<div class="js-modal">
    <div class="js-modal-close"> </div>
    <div class="modal_content">
        <form action="/post/update" method="post">
            <!-- value="(空欄)"なのは見えない処理で更新したい投稿内容を(postid)送る為 -->
            <!-- テキストエリア -->
            <textarea name="upPost" class="modal_post" value=""></textarea>
            <input type="hidden" name="postId" class="modal_id" value="">
            <div class="postUpdate_container">
                <img class="postUpdate_img" src="images?edit.png" alt="編集" width="40">
                <!-- 更新ボタン -->
                <input class="btn-post_update" type="submit" value="更新">
            </div>
            {{ csrf_field() }}
        </form>
        <a class="js-modal-close" href=""></a>
    </div>
</div>
@endsection
