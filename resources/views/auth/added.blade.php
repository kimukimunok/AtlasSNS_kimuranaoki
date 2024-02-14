@extends('layouts.logout')

@section('content')

<div id="added">
    <div class="added_background">
        <ul class="added_welcome">
            <p> {{ session('username') }}さん </p>
            <p>ようこそ!AtlasSNSへ</p>
        </ul>
        <ul class="added_end">
            <p>ユーザー登録が完了いたしました。</p>
            <p>早速ログインをしてみましょう！</p>
        </ul>
        <p class="added_text"><a href="/login">ログイン画面へ</a></p>
    </div>
</div>
<!-- 確認OK -->
@endsection
