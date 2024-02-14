@extends('layouts.login')
@section('content')
<div class="other_container">
    @yield('content')
    @foreach($profile as $profile)
    <div class="profile_content">
        <div class="profile_top">
            <div>
                <img src="{{ asset('storage/' .$profile->images) }}" alt="アイコン" width="50">
            </div>
            <div class="otherProfile_items">
                <ul class="profile_name">
                    <li class="name">name</li>
                    <li>{{ $profile->username }}</li>
                </ul>
                <ul class="profile_bio">
                    <li class="bio">bio</li>
                    <li>{{ $profile->bio }}</li>
                </ul>
            </div>
        </div>
        <!-- フォローボタン -->
        <div class="btn_otherProfile">
            <table>
                @if (Auth::user()->isFollowing($profile->id))
                <tr class="profile_btn">
                    <!-- フォロー解除ボタン　-->
                    <td class="unfollow_btn">
                        <button type="button" class="profile_unfollow_input">
                            <a href="/user/{{ $profile->id }}/unfollow">フォロー解除</a>
                        </button>
                    </td>
                    @else
                    <!-- フォローするボタン -->
                    <td class="following_btn">
                        <button type="button" class="profile_follow_input">
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
<div class="otherProfile_post">
    <!-- アイコンの表示 -->
    <ul class="post_flex">
        <div>
            <img src="{{ asset('storage/' .$post->user->images) }}" alt="アイコン" width="30">
        </div>
        <li class="post_username">{{ $post->user->username }}</li>
        <li class="post_time">{{ $post->created_at }}</li>
    </ul>
    <p class="post_detail">{{ $post->post }}</p>
</div>
@endforeach
@endsection
