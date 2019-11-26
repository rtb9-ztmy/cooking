<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('PageTitle')</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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

    <script src=" {{ mix('js/app.js') }} "></script>
</body>
