<header>
    <div class="header-container">
        <div class="header-left">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/img/BETA_LOGO-80.jpg" alt="メディスタロゴ" width= "153px">
          </a>
        </div>


        <div class="header-right">
            <div class="header-list">
              <ul>
                @guest
                    <li class="login-and-mypage">
                        <a href="{{ route('login') }}">{{ __('ログイン') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                        </li> -->
                    @endif
                    <li><a href="/price-plan">料金プラン</a></li>
                    <li><a href="/getting-ready">ブログ</a></li>
                    <li>
                      <a href="/teachers">講師紹介</a>
                    </li>
                    <li><a href="/how-to-use">使い方</a></li>
                    <!-- <li>
                      <a href="/contact">お問い合わせ</a>
                    </li> -->
                @else
                    <li class="login-and-mypage">
                      <a href="{{ url('/home') }}">
                          マイページ
                      </a>
                    </li>
                    <li>
                      <a href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('ログアウト') }}
                      </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
              </ul>
            </div>
        </div>
    </div>

    <div class="header-container-mobile">

      <div class="header-left">
        <a class="humberger-menu" onclick="openMenu('header-left')">
          <img src="/img/menu-bars.png" alt="">
        </a>
      </div>
      <div class="header-center">
        <a href="/">
          <img src="/img/logo_kana_beta_white@2x.png" alt="white logo">
        </a>

      </div>
      <div class="header-right">
        <a href="#">
          <img src="/img/icon_set.png" alt="">
        </a>
      </div>
      <div id="header-left" class="head-menu-left hidden">
        <label for="menu" class="close" onclick="closeMenu('header-left')"><i class="fas fa-times"></i></label>
        <nav>
          <ul>
            @guest
                <li>
                    <a href="{{ route('login') }}"><i class="fas fa-angle-right"></i>{{ __('ログイン') }}</a>
                </li>
                @if (Route::has('register'))
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                    </li> -->
                @endif
                <li><a href="/price-plan"><i class="fas fa-angle-right"></i>料金プラン</a>
                </li>
                <li><a href="/getting-ready"><i class="fas fa-angle-right"></i>ブログ</a></li>
                <li>
                  <a href="/teachers"><i class="fas fa-angle-right"></i>講師紹介</a>
                </li>
                <li><i class="fas fa-angle-right"></i>使い方</li>
                <li>
                  <a href="/contact"><i class="fas fa-angle-right"></i>お問い合わせ</a>
                </li>
            @else
                <li>
                  <a href="/"><i class="fas fa-angle-right"></i>TOP</a>
                </li>
                <li>
                  <a href="{{ url('/home') }}">
                  <i class="fas fa-angle-right"></i>マイページ
                  </a>
                </li>
                <li>
                  <a href="/newcreate"><i class="fas fa-angle-right"></i>質問する</a>
                </li>
                <li>
                  <a href="/posts/index"><i class="fas fa-angle-right"></i>投稿一覧</a>
                </li>
                  @if (Auth::user()->role_id == 2)
                  <li>
                    <a href="/reword"><p><i class="fas fa-angle-right"></i>収益情報</p></a>
                  </li>
                  @else
                    <!-- <a href="/reword"><p>支払情報</p></a> -->
                  @endif
                <!-- <li>
                  <a href="#">ガイドライン</a>
                </li> -->
                <li>
                  <a href="/contact"><i class="fas fa-angle-right"></i>お問い合わせ</a>
                </li>
                <li>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="fas fa-angle-right"></i>
                      {{ __('ログアウト') }}
                  </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
          </ul>
        </nav>
      </div>
    </div>
</header>
