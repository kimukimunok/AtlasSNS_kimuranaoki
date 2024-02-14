@extends('layouts.login')

@section('content')
<div class="followlist_container">
    <h2>Follow List</h2>
    <div class="followlist_content">
        <!-- アイコン一覧表示 -->
        <!-- $followを取得 -->
        @foreach($follows as $follow)
        <span class="follow_icon">
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
    <div class="followlist_item">
        <div>
            <ul class="post_flex">
                <a href="/users/{{$post->user->id}}/profile">
                    <img src="{{asset('storage/'.$post->user->images)}}" alt="アイコン" width="30"></a>
                <li>{{$post->user->username}}</li>
                <li>{{$post->created_at}}</li>
            </ul>
        </div>
        <ul>
            <li class="followlist_post">{{$post->post}}</li>
        </ul>
    </div>
    @endforeach
</div>
@endsection
<!-- CSSまだ -->
