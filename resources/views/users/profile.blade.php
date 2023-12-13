@extends('layouts.login')

@section('content')
<!-- プロフィールの遷移先設定。↓ -->
{!!Form::open(['url'=>'/profile/update','method'=>'post','files'=>true])!!}
{!![Form::hidden('id',Auth::user()->id)]!!}
@csrf
<div>
    <div>
        <img src="{{\Storage::url(Auth::user()->images)}}" alt="プロフィールアイコン">
    </div>
    <div>
        <ul>
            <li>{{Form::label('username','username',[class'=>'update-label'])}}
                {{Form::text('username',Auth::user()->username,['class'=>'update'])}}
            </li>
            <li>{{Form::label('mail address','mail address',[class'=>'update-label'])}}
                {{Form::text('mail',Auth::user()->mail,['class'=>'update'])}}
            </li>
            <li>{{Form::label('password','password',[class'=>'update-label'])}}
                {{Form::password('password',null,['class'=>'update'])}}
            </li>
            <li>{{Form::label('password_confirmation','password_confirmation',[class'=>'update-label'])}}
                {{Form::password('password_confirmation',null,['class'=>'update'])}}
            </li>
            <li>{{Form::label('bio','bio',[class'=>'update-label'])}}
                {{Form::text('bio',Auth::user()->bio,['class'=>'update'])}}
            </li>
            <li>{{Form::label('image','icon image',[class'=>'update-label'])}}
                <p>
                    {{Form::file('image',['class'=>'update'=>,'id'=>'images'])}}
                    <span>ファイルを選択</span>
                </p>
            </li>
        </ul>
    </div>
</div>
<div><button type="" submit class="btn=profileUpdate">更新</button>
</div>
<!-- バリデーションエラーメッセージ -->
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</div>
{!! Form::close() !!}
@endsection
