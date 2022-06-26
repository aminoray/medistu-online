<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="メディスタオンラインは、医学生と学生エンジニアが互いの強みを生かして開発した全く新しいオンライン家庭教師サービスです。メディスタオンラインでは、自宅学習に励む小中高生と全国の大学生をつなぎます。メディスタオンラインは質問に特化したサービスですので非常に質の高い解説を受講することができます。" />

    <meta property="og:url" content="https://medistu-online.com/" />
    <meta property="og:title" content="メディスタオンライン" />
    <meta property="og:type" content="website">
    <!-- <meta property="og:description" content="記事の抜粋" /> -->
    <meta property="og:image" content="{{ asset('img/logo_color@2x.png') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@medistu_online" />
    <meta property="og:site_name" content="メディスタオンライン" />
    <meta property="og:locale" content="ja_JP" />
    <!-- <meta property="fb:app_id" content="appIDを入力" /> -->

    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/logo_seihoukei.jpg') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'メディスタオンライン') }}</title> -->
    <title>メディスタオンライン</title>

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/default.css') }}" media="screen and (min-width:1024px)">
    <link rel="stylesheet" href="{{ asset('css/default_for_mobile.css') }}" media="screen and (max-width:480px)">
    <link rel="stylesheet" href="{{ asset('css/default_for_tablet.css') }}" media="screen and (min-width:480px) and (max-width:1023px)">

    <!-- <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet"> -->
    @yield('stylesheet')

    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="/favicon_32px.ico">

</head>



<body>
  <div id="mask" class="mask hidden">
  </div>

  <x-header />

  <main>
    @if (session('flash_message'))
    <div class="flash_message" onclick="this.classList.add('hidden')">{{ session('flash_message') }}</div>
    @endif
    <div id="logout" class="flash_message hidden" onclick="this.classList.add('hidden')">ログアウトしました。</div>

    @yield('content')
  </main>

  <x-footer />
</body>
</html>
