@extends('layouts.login')
@section('content')
<div class="other-container">
    @yield('content')
    @foreach($users as $user)
    <div class="profile-content">
        <div class="profile-top">
            <div>
                <img src="{{ asset('storage/' .$profile->images) }}" alt="アイコン" width="50">
            </div>
            <div class="otherProfile-items">
                <ul class="profile-name">
                    <li class="name">name</li>
                    <li>{{ $profile->username }}</li>
                </ul>
                <ul class="profile-bio">
                    <li class="bio">bio</li>
                    <li>{{ $profile->bio }}</li>
                </ul>
            </div>
        </div>
        <!-- フォローボタン -->
        <div class="btn-otherProfile">
            <table>
                <!-- ログインユーザーがフォローしていたら、もしくはしていなかったら -->
                @if (Auth::user()->Following($users->id))
                <tr class="profile-btn">
                    <!-- フォロー解除ボタン　-->
                    <td class="unfollow_btn">
                        <button type="button" class="profile_unfollow-input">
                            <a href="/user/{{ $profile->id }}/unfollow">フォロー解除</a>
                        </button>
                    </td>
                    <!-- ログインユーザーがフォローしていない時、フォローするボタンを表示する　-->
                    @else
                    <!-- フォローするボタン -->
                    <td class="following_btn">
                        <button type="button" class="profile_follow-input">
                            <a href="/user/{{ $profile->id }}/follow">フォローする</a>
                        </button>
                    </td>
                </tr>
                @endif
            </table>
        </div>
    </div>
    @endforeach
</div>


<!-- 他ユーザーの投稿 -->
@foreach($posts as $post)

<div class="otherProfile-post">
    <!-- アイコンの表示 -->
    <div>
        <img src="{{ asset('storage/' .$post->user->images) }}" alt="アイコン" width="45">
    </div>
    <div>
        <ul class="otherPost-flex">
            <li class="post-username">{{ $post->user->username }}</li>
            <li class="profile_post-time">{{ $post->created_at }}</li>
        </ul>
        <p class="other-post">{{ $post->post }}</p>
    </div>
</div>
@endforeach
@endsection
<!-- 12/27ここで躓いている。 -->
