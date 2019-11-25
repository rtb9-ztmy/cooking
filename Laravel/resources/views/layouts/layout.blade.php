<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('PageTitle')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/confirm.js') }}"></script>
</head>
<body>
    <!-- ヘッダー -->
    <header>
        <h2 class="AppTitle m-5 d-inline-block">商品情報管理システム</h2>
        <div class="float-right m-5">
            <a href="/logout" class="btn btn-outline-primary btn-lg">ログアウト</a>
        </div>
        <h2 class="PageTitle w-50 mx-auto text-center">@yield('PageTitle')</h2>
    </header>

    <!-- コンテンツ -->
    <div class="container">
    @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
