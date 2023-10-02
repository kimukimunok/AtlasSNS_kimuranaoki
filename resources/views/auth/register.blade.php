@extends('layouts.logout')

<!-- [タスク2]バリデーションの設定、エラーメッセージ表示記述1002 -->
<!-- Laravel createの実装にて、~~.blade.phpに追記していた為ここに記述 -->
@if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif

@section('content')
<!-- [タスク01]新規登録先のルーティング記述↓ 0929済 -->
{!! Form::open(['url' => '/added']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

           $request->validate([
                'username' => 'required|min:2|max:12|',
                'mail' => 'required|unique:atlas_sns,|min:5|max:40',//atlas_snsにはmailテーブルが無かったため一旦スルー/10/2
                'password' => 'required|alpha_num|min:8|max:20|',
                'password_confirmation' => 'required|alpha_num|password_confirmed||min:8|max:20',
            ]);

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
