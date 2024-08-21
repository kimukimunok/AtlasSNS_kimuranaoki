@extends('layouts.login')
@section('content')
{!! Form::open(['url' => 'post/create']) !!}
<div class="form_container">
    <img class="user_icon" src=" {{ asset('storage/'.Auth::user()->images)}}" alt="アイコン" width="50">
    {{ Form::textarea('newPost', null, ['required', 'class' => 'post', 'placeholder' => '投稿内容を入力してください.;']) }}
    <div class="form_btn_container">
        <button input="submit" class="post_btn" href="">
            <img class="btn_success" src="images/post.png" alt="送信">
        </button>
    </div>
</div>
{!! Form::close() !!}

<!-- 投稿一覧の表示 -->
@foreach ($posts as $post)
<div class="post_container">
    <div>
        <div>
            <ul class="post_flex">
                <div>
                    <!-- アイコンを表示する。 -->
                    <img src="{{ asset('storage/' .$post->user->images) }}" alt="アイコン" width="30">
                </div>
                <!-- ユーザー名-->
                <li class="post_username">{{$post->user->username}}</li>
                <!-- 投稿日時 -->
                <li class="post_time">{{$post->created_at}}</li>
            </ul>
        </div>
        <ul>
            <li class="post_detail">{!! nl2br(e($post->post)) !!}</li>
        </ul>
        @if(Auth::user()->id == $post->user->id)

        <!-- 投稿編集機能 -->
        <div class="modal_container">
            <a class="js_modal_open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
                <img src="images/edit.png" alt="編集" width="30"></a>
            <!-- 投稿削除 -->
            <a class="post_delete" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                <img class="delete" src="images/trash.png" alt="削除">
            </a>
        </div>
        @endif
    </div>
</div>
@endforeach
<!-- モーダル -->
<div class="modal js_modal">
    <div class="modal__bg js_modal_close"></div>
    <div class="modal__content">
        <form action="/post/update" method="post">
            <!-- テキストエリア -->
            <textarea name="upPost" class="modal_post" value=""></textarea>
            <input type="hidden" name="postId" class="modal_id" value="">
            <div class="postUpdate_container">
                <img class="postUpdate_img" src="images/edit.png" alt="編集" width="40">
                <!-- 更新ボタン -->
                <input class="btn_post_update" type="submit" value="更新">
            </div>
            {{ csrf_field() }}
        </form>
        <a class="js_modal_close" href=""></a>
    </div>
</div>
@endsection
