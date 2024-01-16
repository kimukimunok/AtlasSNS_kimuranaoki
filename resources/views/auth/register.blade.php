@extends('layouts.logout')

@section('content')
<!-- ルーティング -->
{!! Form::open(['url' => '/register']) !!}
<!-- [タスク2]バリデーションの設定、エラーメッセージ表示記述1002 -->
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



<div class="login-container">
    <div class="register-background">
        <div class="login-items">
            <p class="login-text">新規ユーザー登録</p>
            <ul>
                <li class="register-label">{{ Form::label('user name', 'user name') }}</li>
                <li class="form-text">{{ Form::text('username',null,['class' => 'input']) }}</li>
                <li class="register-label">{{ Form::label('mail address', 'mail address') }}</li>
                <li class="form-text">{{ Form::text('mail',null,['class' => 'input']) }}</li>
                <li class="register-label">{{ Form::label('password', 'password') }}</li>
                <li class="form-text">{{ Form::password('password',null,['class' => 'input']) }}</li>
                <li class="register-label">{{ Form::label('password_confirmation', 'password_confirmation') }}</li>
                <li class="form-text">{{ Form::password('password_confirmation',null,['class' => 'input']) }}</li>
                <form>
                    <p><input class="btn btn-register" type="submit" value="REGISTER"></p>
                </form>
            </ul>
            {!! Form::close() !!}
            <p class="register-text"><a href="/login">ログイン画面へ戻る</a></p>
        </div>
    </div>
</div>
<!-- CSSok -->


@endsection
