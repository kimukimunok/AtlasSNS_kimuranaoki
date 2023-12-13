@extends('layouts.login')
@section('content')
<div>
    {!!Form::open(['url'=>'/userprofile'])!!}
    <!-- section('content')を通すトンネル？ -->
    @yield('content')
    @foreach($users as $user)
    <div>
        <div>
            <div>
                <!-- <img src="asset('storage/' .$user->images)" alt="アイコン" width="50"> -->
            </div>
            <div>
                <ul>
                    <li>name</li>
                    <li>{{ $users->username }}</li>
                </ul>
            </div>
        </div>
        <!-- フォローボタン -->
        <div class="userfollowbtn">
            <teble>
                <!-- ログインユーザーがフォローしていたら、もしくはしていなかったら -->
                @if (Auth::user()->Following($users->id))
                <tr>
                    <!-- フォロー解除ボタン　-->
                    <td>
                        <button type="button">
                            <a href="/user/{{ $users->id }}/unfollow">フォロー解除</a>
                        </button>
                    </td>
                    <!-- ログインユーザーがフォローしていない時、フォローするボタンを表示する　-->
                    @else
                    <!-- フォローするボタン -->
                    <td class="following_btn">
                        <button type="button">
                            <a href="/user/{{ $users->id }}/follow">フォローする</a>
                        </button>
                    </td>
                </tr>
                @endif
            </teble>
        </div>
    </div>
    @endforeach
</div>


<!-- 他ユーザーの投稿 -->
<!-- ↓の文でエラー出るため消してる。 -->
<!-- foreach($posts as $post)
<div>
    <div>
        <img src=" asset('storage/'.$post->user->images) " alt="アイコン" width="45">
    </div>
    <div>
        <ul>
            <li> ｛｛$post->user->username ｝｝</li>
            <li> ｛｛$post->created_at ｝｝</li>
        </ul>
        <p> ｛｛$post->post ｝｝</p>
    </div>
</div>
endforeach -->
@endsection
