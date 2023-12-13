@extends('layouts.login')
<!-- ログインしているユーザーと、フォローされているユーザーを見れるようにしたい。 -->
@section('content')
<div>

    <h2>Follower List</h2>
    <div>
        <!-- アイコン一覧表示(followlistと同じ) -->
        @foreach($followers as $follower)
        <span>
            <!-- ここの記述がfollowかfollowerか違うのみ -->
            <a href="/users/{{$follower->id}}/profile">
                <img src=" {{ asset('storage/' .$follower->images) }}" alt="アイコン" width="45">
            </a>
        </span>
        @endforeach
    </div>
    @foreach($posts as $post)
    <div>
        <div>
            <!-- アイコンの表示 -->
            <ul>
                <a href="/users/{{$post->user->id}}/profile">
                    <img src="{{ asset('storage/' .$post->user->images) }}" alt="アイコン" width="50"></a>
                <li>{{ $post->user->username }}</li>
                <li>{{ $post->created_at }}</li>
            </ul>
        </div>
        <ul>
            <li>{{ $post->post }}</li>
        </ul>
    </div>
    @endforeach
</div>


@endsection
