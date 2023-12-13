@extends('layouts.login')

@section('content')
<div>
    <h2>Follow List</h2>
    <div>
        <!-- アイコン一覧表示 -->
        <!-- $followを取得 -->
        @foreach($follows as $follow)
        <span>
            <!-- idに合わせたプロフィールを表示 -->
            <a href="/users/{{$follow->id}}/profile">
                <!-- アイコンを取得 -->
                <img src="{{ asset('storage/'.$follow->images)}}" alt="アイコン"></a>
        </span>
        @endforeach
    </div>
    <!-- アイコン表示 -->
    @foreach ($posts as $post)
    <div>
        <div>
            <ul>
                <a href="/users/{{$post->user->id}}/profile">
                    <img src="{{asset('storage/'.$post->user->images)}}" alt="アイコン"></a>
                <li>{{$post->user->username}}</li>
                <li>{{$post->created_at}}</li>
            </ul>
        </div>
        <ul>{{$post->post}}</ul>
    </div>
    @endforeach
</div>
@endsection
