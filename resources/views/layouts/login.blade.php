<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <title>AtlasSNS</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header>
        <div id="head">
            <h1><a href="/top"><img class="header-atlas" src="{{asset('images/atlas.png')}}" width="100"></a></h1>

            <!-- アコーディオンメニュー -->
            <div class="accordion-container">
                <dl class="accordion-list">
                    <dt class="accordion-title js-title">{{ Auth::user()->username }}さん<img src="{{ \Storage::url(Auth::user()->images) }}" width="30"></dt>
                    <dd class="accordion-text">
                        <ul>
                            <li class="text-home"><a href="/top">HOME</a></li>
                            <li class="text-profile"><a href="/profile">プロフィール編集</a></li>
                            <li class="text-logout"><a href="logout">ログアウト</a></li>
                        </ul>
                    </dd>
                </dl>
            </div>

    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="side-menu">
                <p class="side-username">{{ Auth::user()->username }}さんの</p>
                <!-- （ログインしているユーザー）さんの -->
                <div class="follows">
                    <p>フォロー数</p>
                    <p class="count">{{ Auth::user()->follow()->get()->count() }}人</p>
                    <!-- ログインしているユーザーさんがフォローしている人数 -->
                </div>
                <p class="btn"><a href="/followList">フォローリスト</a></p>
                <div class="follower">
                    <p>フォロワー数</p>
                    <p class="count">{{ Auth::user()->follower()->get()->count() }}人</p>
                    <!-- ログインしているユーザーさんをフォローしている人数 -->
                </div>
                <p class="btn"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <p class="btn-search"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <!-- jqueryのリンク -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- 自作のJSファイルを下記に指定する。script.js -->
    <!-- JSフォルダにscript.jsフォルダを作って、モーダルの設定をする。 -->
    <script src="{{ asset('js/script.js' )}}"></script>

</html>
<!-- CSS完了しているが質問
全体幅が100％になるようメイン場所とサイドバーの幅を調節しても設定できない。
アイコンが表示されない。 -->
