@extends('layouts.login')

@section('content')
<!-- プロフィールの遷移先設定。↓ -->
{!!Form::open(['url'=>'/profile/update','method'=>'post','files'=>true])!!}
{!!Form::hidden('id',Auth::user()->id)!!}
<div class="profile_container">
    @csrf
    <div class="myProfile-content">
        <div class="profile-icon">
            <img src="{{ \Storage::url(Auth::user()->images) }}" alt="プロフィールアイコン" width="45">
        </div>
        <div class="profile-items">
            <ul>
                <!-- ユーザーネーム -->
                <li>{{Form::label('user name', 'user name', ['class'=>'update-label'] )}}
                    {{Form::text( 'username', Auth::user()->username ,['class'=>'update'])}}
                </li>
                <!-- メールアドレス -->
                <li>{{Form::label('mail address', 'mail address',['class'=>'update-label'] )}}
                    {{Form::text('mail', Auth::user()->mail ,['class'=>'update'])}}
                </li>
                <!-- パスワード -->
                <li>{{Form::label('password', 'password',['class'=>'update-label'] )}}
                    {{Form::password('password', null, ['class'=>'update'])}}
                </li>
                <!-- パスワード確認 -->
                <li>{{Form::label('password_confirmation', 'password_confirmation', ['class'=>'update-label'] )}}
                    {{Form::password('password_confirmation',null,['class'=>'update'])}}
                </li>
                <!-- bioって何→自己紹介文 -->
                <li>{{Form::label('bio', 'bio',['class'=>'update-label'] )}}
                    {{Form::text('bio',Auth::user()->bio,['class'=>'update'])}}
                </li>
                <!-- アイコン -->
                <li>{{Form::label('image', 'icon image', ['class'=>'update-label'] )}}
                    <p class="img-update">
                        {{Form::file('image',['class'=>'update','id'=>'images'])}}
                        <span>ファイルを選択</span>
                    </p>
                </li>
            </ul>
        </div>
    </div>
    <div>
        <button type="submit" class="btn-profileUpdate">更新</button>
    </div>
    <!-- バリデーションエラーメッセージ -->
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
{!! Form::close() !!}
@endsection
