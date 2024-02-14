@extends('layouts.logout')

@section('content')
{!! Form::open(['url' => '/login']) !!}
<div class="login_container">
    <div class="background">
        <div class="login_items">
            <p class="login_text">AtlasSNSへようこそ</p>
            <ul>
                <li class="form_label">{{ Form::label('mail address','mail address') }}</li>
                <li class="form_text">{{ Form::text('mail',null,['class' => 'input']) }}</li>
                <li class="form_label">{{ Form::label('password','password') }}</li>
                <li class="form_text">{{ Form::password('password',['class' => 'input']) }}</li>
                <div class="login_button">
                    <form>
                        <p><input class="btn btn_loginregister" type="submit" value="LOGIN"></p>
                    </form>
                </div>
            </ul>
            <p class="register_text"><a href="/register">新規ユーザーの方はこちら</a></p>
        </div>
    </div>
</div>
{!! Form::close() !!}
<!--確認 -->
@endsection
