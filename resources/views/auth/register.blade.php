@extends('layouts.logout')

@section('content')
<!-- ルーティング -->
{!! Form::open(['url'=>'/register'])!!}
@foreach($errors->all() as $error)
{{ $error }}
@endforeach
<div class="login_container">
    <div class="register_background">
        <div class="login_items">
            <p class="login_text">新規ユーザー登録</p>
            <ul>
                <li class="register_label">{{ Form::label('username', 'user name') }}</li>
                <li class="form_text">{{ Form::text('username',null,['class' => 'input']) }}</li>
                <li class="register_label">{{ Form::label('mail address', 'mail address') }}</li>
                <li class="form_text">{{ Form::text('mail',null,['class' => 'input']) }}</li>
                <li class="register_label">{{ Form::label('password', 'password') }}</li>
                <li class="form_text">{{ Form::password('password',null,['class' => 'input']) }}</li>
                <li class="register_label">{{ Form::label('password_confirmation', 'password_confirmation') }}</li>
                <li class="form_text">{{ Form::password('password_confirmation',null,['class' => 'input']) }}</li>
                <form>
                    <p><input class="btn btn_register" type="submit" value="REGISTER"></p>
                </form>
            </ul>
            {!! Form::close() !!}
            <p class="register_text"><a href="/login">ログイン画面へ戻る</a></p>
        </div>
    </div>
</div>
<!-- 確認OK -->


@endsection
