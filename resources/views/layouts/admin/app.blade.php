<!-- admin -->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'メディスタオンライン') }}</title> -->
    <title>メディスタオンライン</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">
    @yield('stylesheet')

    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400&display=swap" rel="stylesheet">

</head>



<body>
  <header>
      <div class="header-container">
          <div class="header-left">
            <a class="navbar-brand" href="{{ url('/') }}">
              <img src="/img/logo_color@2x.png" alt="メディスタロゴ" width= "153px">
            </a>
          </div>

          <div class="header-right">
              <div class="header-list">
                <ul>
                  @unless (Auth::guard('admin')->check())　　　
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('admin.register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="login-and-mypage">
                        <a href="{{ url('/admin/home') }}">
                            マイページ
                        </a>
                      </li>
                      <li>
                        <a href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('ログアウト') }}
                        </a>

                          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </li>
                      <li>
                        管理者
                      </li>
                  @endunless
                </ul>
              </div>
          </div>
    </div>
  </header>

  <main>
    @if (session('flash_message'))
    <div class="flash_message" onclick="this.classList.add('hidden')">{{ session('flash_message') }}</div>
    @endif

    @yield('content')
  </main>

  <x-footer />
</body>
</html>
