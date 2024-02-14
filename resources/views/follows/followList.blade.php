@extends('layouts.login')

@section('content')
<div class="followlist_container">
    <h2>Follow List</h2>
    <div class="followlist_content">
        <!-- アイコン一覧表示 -->
        <!-- $followを取得 -->
        @foreach($follows as $follow)
        <span>
            <!-- idに合わせたプロフィールを表示 -->
            <a href="/users/{{$follow->id}}/profile">
                <!-- アイコンを取得 -->
                <img src="{{ asset('storage/'.$follow->images)}}" alt="アイコン" width="30"></a>
        </span>
        @endforeach
    </div>
    <div class="line"></div>
    <!-- アイコン表示 -->
    @foreach ($posts as $post)
    <div class="followerlist_item">
        <div>
            <ul class="post_flex">
                <div>
                    <a href="/users/{{$post->user->id}}/profile">
                        <img src="{{asset('storage/'.$post->user->images)}}" alt="アイコン" width="30"></a>
                </div>
                <!--ユーザー名 -->
                <li class="post_username">{{ $post->user->username }}</li>
                <!-- 投稿日時 -->
                <li class="post_time">{{ $post->created_at }}</li>
            </ul>
        </div>
        <ul>
            <li class="post_detail">{{$post->post}}</li>
        </ul>
    </div>
    @endforeach
</div>
@endsection
<!-- OK -->
