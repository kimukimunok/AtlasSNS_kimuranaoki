@extends('layouts.logout')

@section('content')

<div id="clear">
    <div class="added-background">
        <!-- [タスク1-3]セッション機能を使用して新規登録ユーザー名を表示させる。 -->
        <!-- ↓Controlloer側で[->with]を使い値を送って、added側でと入れることで表示できる。 -->
        <ul class="added-welcome">
            <p> {{ Session('username') }}さん </p>
            <p>ようこそ！AtlasSNSへ</p>
        </ul>
        <ul class="added-end">
            <p>ユーザー登録が完了いたしました。</p>
            <p>早速ログインをしてみましょう！</p>
        </ul>

        <p class="added-text"><a href="/login">ログイン画面へ</a></p>
    </div>
</div>
<!-- CSSまだ -->

@endsection
