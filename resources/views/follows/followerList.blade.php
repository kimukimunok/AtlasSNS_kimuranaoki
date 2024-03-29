@extends('layouts.login')
<!-- ログインしているユーザーと、フォローされているユーザーを見れるようにしたい。 -->
@section('content')
<div class="followlist_container">
    <h2>Follower List</h2>
    <div class="followlist_content">
        <!-- アイコン一覧表示(followlistと同じ) -->
        @foreach($followers as $follower)
        <span>
            <!-- ここの記述がfollowかfollowerか違うのみ -->
            <a href="/users/{{$follower->id}}/profile">
                <img src=" {{ asset('storage/' .$follower->images) }}" alt="アイコン" width="30">
            </a>
        </span>
        @endforeach
    </div>
    <div class="line"></div>
    @foreach($posts as $post)
    <div class="followerlist_item">
        <div>
            <!-- アイコン表示 -->
            <ul class="post_flex">
                <div>
                    <a href="/users/{{$post->user->id}}/profile">
                        <img src="{{asset('storage/'.$post->user->images)}}" alt="アイコン" width="30"></a>
                </div>
                <li class="post_username">{{ $post->user->username }}</li>
                <li class="post_time">{{ $post->created_at }}</li>
            </ul>
        </div>
        <ul>
            <li class="post_detail">{{ $post->post }}</li>
        </ul>
    </div>
    @endforeach
</div>
<!--ok -->

@endsection
