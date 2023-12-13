@extends('layouts.login')

@section('content')
<!--検索機能-->
{!! Form::open(['url' => '/search', 'method' => 'GET','files'=>true]) !!}
@csrf
{!!Form::input ('text','keyword',null,['class'=>'keyword','placeholder'=>'ユーザー名'])!!}
<button type="submit">
    <img src="" alt="検索">
</button>
{!! Form::close() !!}

<!-- 検索ワードの表示 -->
@if(isset( $keyword ))
<p class="search_word">検索ワード：{{ $keyword }}</p>
@endif

<!-- ここにフォローするボタンを作る -->
<!-- アカウント一覧を表示させる -->
<table>
    @foreach ($users as $user)
    <img src="" alt="ユーザーアイコン">
    <li><{{$user->username}} @if (Auth::user()->follow($user->id))</li>
    <button type=button>
        <a href="/user/{{ $user->id }}/unfollow">フォロー解除</a>
    </button>
    @else
    <!-- フォローしていない場合フォローボタンを表示させる。 -->
    <button type=button>
        <a href="/user/{{$user->id}}/follow">フォローする</a>
    </button>
    @endif
    @endforeach
</table>


@endsection
