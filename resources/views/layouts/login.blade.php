<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
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
            <div id="">
                <div id="">
                    <p>{{ Auth::user()->username }}さん<img src="images/arrow.png"></p>
                    <!-- [タスク3-2]アコーディオンメニューを表示させる「!!CSSまだ!!矢印変わるとか背景色とかまだ!!」 -->
                    <div>
                        <!-- [details]でHTML/CSSでアコーディオンメニューが作れる。詳細は→[https://lab.dxo.co.jp/notes/web-design/accordion-menu] -->
                        <details>
                            <ul>
                                <!-- [タスク3-3]ホームとプロフィール編集のリンクを設定する。「!!実装がそんなに進んでないから後でまた再確認!!」 -->
                                <li><a href="/top">ホーム</a></li>
                                <li><a href="/userprofile">プロフィール</a></li>
                                <!-- [タスク3-4]ログアウト機能の実装、下のリンクを"/logout"から"/login"に変更→間違い -->
                                <li><a href="/logout">ログアウト</a></li>
                            </ul>
                        </details>
                        <!-- アコーディオンメニュー済み -->
                    </div>
                </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <!-- （ログインしているユーザー）さんの -->
                <div>
                    <p>フォロー数</p>
                    <p>{{ Auth::user()->follow()->get()->count() }}名</p>
                    <!-- ログインしているユーザーさんがフォローしている人数 -->
                </div>
                <p class="btn"><a href="/followList">フォローリスト</a></p>
                <div>
                    <p>フォロワー数</p>
                    <p>{{ Auth::user()->follower()->get()->count() }}</p>
                    <!-- ログインしているユーザーさんをフォローしている人数 -->
                </div>
                <p class="btn"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <!-- Jqueyのリンク -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/script.js' )}}"></script>

</html>
