<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    {{-- 対応するスタイルシートを読み込む--}}
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">
                {{-- <a class="header__logo--link" href="/">FashionablyLate</a> --}}
                {{-- リンクか見出しか --}}
                <h2 class="header__heading">FashionablyLate</h2>
            </div>
            {{-- 登録、ログイン、管理画面でnavタグを使用する為 --}}
            @yield('nav')
        </div>
    </header>

    <main>
        {{-- ページごとのメインコンテンツを読み込む --}}
        @yield('content')
    </main>
</body>
</html>