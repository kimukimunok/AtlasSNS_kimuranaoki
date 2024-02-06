@extends('layouts.login')

@section('content')
<div class="followlist_container">
    <h2>Follow List</h2>
    <div class="followlist-content">
        <!-- アイコン一覧表示 -->
        <!-- $followを取得 -->
        @foreach($follows as $follow)
        <span class="follow-icon">
            <!-- idに合わせたプロフィールを表示 -->
            <a href="/users/{{$follow->id}}/profile">
                <!-- アイコンを取得 -->
                <img src="{{ asset('images/'.$follow->images)}}" alt="アイコン" width="30"></a>
        </span>
        @endforeach
    </div>
    <div class="line"></div>
    <!-- アイコン表示 -->
    @foreach ($posts as $post)
    <div class="followlist-item">
        <div>
            <ul class="post-flex">
                <a href="/users/{{$post->user->id}}/profile">
                    <img src="{{asset('images/'.$post->user->images)}}" alt="アイコン" width="30"></a>
                <li>{{$post->user->username}}</li>
                <li>{{$post->created_at}}</li>
            </ul>
        </div>
        <ul>
            <li class="followlist-post">{{$post->post}}</li>
        </ul>
    </div>
    @endforeach
</div>
@endsection
<!-- CSSまだ -->
