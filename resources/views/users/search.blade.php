@extends('layouts.login')

@section('content')
<!--検索機能-->
{!! Form::open(['url' => '/search', 'method' => 'GET']) !!}
<div class="user_search">
    {!! Form::input ('text', 'keyword' , null , ['class' => 'keyword' , 'placeholder '=> 'ユーザー名' ]) !!}
    <button type="submit" class="search_btn">
        <img class="search_push" src="./images/search.png" alt="検索" width="40">
    </button>
    {!! Form::close() !!}

    <!-- 検索ワードの表示 -->
    @if(!empty($keyword))
    <p class="search_word">検索ワード：{{ $keyword }}</p>
    @endif
</div>
<!-- アカウント一覧を表示 -->
<div class="container_list">
    <table>
        @foreach ($users as $user)
        <ul class="list_items">
            <li><img src="{{ asset('storage/' .$user->images) }}" alt="ユーザーアイコン" width="50"></li>
            <li class="search_username">{{ $user->username }}</li>
            <!-- ログインユーザーがフォローしていたらフォロー解除ボタンを表示する -->
            @if (Auth::user()->isFollowing($user->id))
            <div class="btn_container">
                <li class="unfollow_container">
                    <button type="button" class="unfollow_input">
                        <a href="/user/{{ $user->id }}/unfollow">フォロー解除</a>
                    </button>
                </li>
                <!-- 反対にフォローしていなかったらフォローするボタンを表示させる -->
                @else
                <li class="follow_container">
                    <button type="button" class="follow_input">
                        <a href="/user/{{ $user->id }}/follow">フォローする</a>
                    </button>
                </li>
            </div>
            @endif
        </ul>
        @endforeach
    </table>
</div>
@endsection
<!-- 確認ok -->
