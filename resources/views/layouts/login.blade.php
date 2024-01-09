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
            <!-- [タスク3-1]ロゴにリンクを設置する。 ログイン画面のトップページは"/top"と思うから、/topにしてるけどエラー出るから"web.php"の"/top"に対するルーティングに[get]を追加（getにすることでログイン中にログイン情報を持ってくるから？） -->
            <h1><a href="/top"><img src="images/atlas.png"></a></h1>
            <div class="accordion-container">
                <ul>
                    <li class="header-username">{{ Auth::user()->username }}さん</li>
                    <li class="accordion-push"></li>
                </ul>
                <!-- アコーディオンメニュー -->
                <div class="menu-container">
                    <nav>
                        <ul class="menu-items">
                            <li class="home"><a href="/top">HOME</a></li>
                            <li class="profile"><a href="/profile">プロフィール</a></li>
                            <li class="logout"><a href="/logout">ログアウト</a></li>
                        </ul>
                    </nav>
                </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p class="side-name">{{ Auth::user()->username }}さんの</p>
                <!-- （ログインしているユーザー）さんの -->
                <div class="auth-follows">
                    <p>フォロー数</p>
                    <p class="count">{{ Auth::user()->follow()->get()->count() }}人</p>
                    <!-- ログインしているユーザーさんがフォローしている人数 -->
                </div>
                <p class="btn"><a href="/followList">フォローリスト</a></p>
                <div class="auth-follower">
                    <p>フォロワー数</p>
                    <p>{{ Auth::user()->follower()->get()->count() }}人</p>
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
<!-- CSSまだ -->
