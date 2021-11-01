<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="カリキュラム生情報" />
    <title>DAWN-PROGRESS</title>
    <link rel="stylesheet" href="{{ mix('css/reset.css') }}">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header id="container">
        <div class="main-title">DAWN CURRICULUM</div>
        <div class="subtitle">~カリキュラム生に寄り添う講師でありたい~</div>
        @if (!empty($search_word))
            <a class="return" href="/">＜＜一覧表示へ戻る</a>
        @elseif(!empty($studentInfo['student_id']))
            <a class="return" href="/">＜＜一覧表示へ戻る</a>
        @elseif(Request::is('sort'))
            <a class="return" href="/">＜＜一覧表示へ戻る</a>
        @endif
    </header>
    
        @yield('content')
    
    <footer>
        <p>@maked by Mintia</p>
    </footer>
    <script type="text/javascript" src="js/style.js"></script>
</body>
</html>