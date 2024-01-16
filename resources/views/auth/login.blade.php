@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
<!-- [タスク01]ログイン先のルーティング記述↓ 0929済-->
{!! Form::open(['url' => '/login']) !!}
<div class="login-container">
    <div class="background">
        <div class="login-items">
            <p class="login-text">AtlasSNSへようこそ</p>
            <ul>
                <li class="form-label">{{ Form::label('mail address','mail address') }}</li>
                <li class="form-text">{{ Form::text('mail',null,['class' => 'input']) }}</li>
                <li class="form-label">{{ Form::label('password','password') }}</li>
                <li class="form-text">{{ Form::password('password',['class' => 'input']) }}</li>
                <div class="login-button">
                    <form>
                        <p><input class="btn btn-loginregister" type="submit" value="LOGIN"></p>
                    </form>
                </div>
            </ul>
            <p class="register-text"><a href="/register">新規ユーザーの方はこちら</a></p>
        </div>
    </div>
</div>
{!! Form::close() !!}
<!-- CSS記述ok -->
@endsection
