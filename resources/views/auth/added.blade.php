@extends('layouts.logout')

@section('content')

<div id="clear">
<!-- [タスク1-3]セッション機能を使用して新規登録ユーザー名を表示させる。 -->
  <p>  {{ Session::get('username') }}さん </p>
<!-- ↑Controlloer側で[->with]を使い値を送って、added側でと入れることで表示できる。 -->



  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
