@guest
<footer class="guest_footer">
@else
<footer>
@endguest
    <div class="footer-top">
      <div class="section">
        <ul class="footer-list">
            <li><a href="/home">問題を質問する</a></li>
            <li><a href="/how-to-use">メディスタオンラインの使い方</a></li>
            <li><a href="/home">ユーザープロフィール</a></li>
            <li> <a href="/student_guideline">解説受講ガイドライン</a>
              </li>
            <li><a href="/getting-ready">提携塾生質問ページ</a></li>
        </ul>
      </div>

      <div class="section">
        <ul class="footer-list">
           <!-- <li>問題を解説する</li> -->
           <li><a href="/getting-ready">学びを提供しませんか？</a></li>
           @guest
           <li>
             <a href="/application">講師に登録する</a>
           </li>

           @else
             @if (Auth::user()->role_id == 2 )
             <li>
               <a>
               講師申請済
               </a>
             </li>
             @else
             <li>
               <a href="/application">講師に登録する</a>
             </li>
             @endif

           @endguest
           <li><a href="/teacher_guideline">講師ガイドライン</a>
             </li>
           <li><a href="/home">質問一覧</a></li>
        </ul>
      </div>

      <div class="section">
        <ul class="footer-list">
           <li>
            <a href="/getting-ready">運営者</a>
          　</li>
           <li>
            <a href="/plivacy-policy">プライバシーポリシー</a>
           </li>
           <li>
             <a href="/terms-of-service">利用規約</a>
           </li>
           <!-- <li>最新情報</li> -->
           <li><a href="/getting-ready">よくある質問</a></li>
           <li>
            <a href="/contact">お問い合わせ</a>
           </li>
        </ul>
      </div>

    </div>
    <div class="footer-bottom">
        <p>Copyright© 2020 家庭教師のメディスタオンライン All Rights Reserved.</p>
    </div>

    @guest

    @else
    <div class="footer-for-mobile">
      <ul>
        <li>
          <a class="{{ (request()->is('home')) ? 'active' : '' }}" href="{{ url('/home') }}">
            <img class="icon-on" src="/img/home_blue.png" alt="home icon">
            <img class="icon-off" src="/img/home_black.png" alt="home icon">
          </a>
        </li>
        <li>
          <a class="{{ (request()->is('post*')) ? 'active' : '' }}" href="{{ url('/posts/index') }}">
            <img class="icon-on" src="/img/index_blue.png" alt="index icon">
            <img class="icon-off" src="/img/index_black.png" alt="incex icon">
          </a>
        </li>
        @if (Auth::user()->role_id == 3 )
        <li>
          <a class="{{ (request()->is('newcreate*')) ? 'active' : '' }}" href="{{ url('/newcreate') }}">
            <img class="icon-on" src="/img/post_blue.png" alt="newcreate icon">
            <img class="icon-off" src="/img/post_black.png" alt="newcreate icon">
          </a>
        </li>
        @endif
        <li>
          <a class="{{ (request()->is('notify*')) ? 'active' : '' }}" href="{{ url('/notify') }}">
            <img class="icon-on" src="/img/notify_blue.png" alt="notify icon">
            <img class="icon-off" src="/img/notify_black.png" alt="notify icon">
          </a>
        </li>
        <li>
          <a onclick="openMenu('footer-menu')">
            <img class="icon-on" src="/img/etc_blue.png" alt="etc icon">
            <img class="icon-off" src="/img/etc_black.png" alt="etc icon">
          </a>
        </li>
      </ul>
    </div>

    <div id="footer-menu" class="footer-menu hidden">
      <label for="menu" class="close" onclick="closeMenu('footer-menu')"><i class="fas fa-times"></i></label>
      <nav>
        <ul>
          <li>
           <a href="/getting-ready"><i class="fas fa-angle-right"></i>運営者</a>
         　</li>
          <li>
           <a href="/plivacy-policy"><i class="fas fa-angle-right"></i>プライバシーポリシー</a>
          </li>
          <li>
            <a href="/terms-of-service"><i class="fas fa-angle-right"></i>利用規約</a>
          </li>
          <!-- <li>最新情報</li> -->
          <li><a href="/how-to-use"><i class="fas fa-angle-right"></i>メディスタオンラインの使い方</a></li>
          <li><a href="/getting-ready"><i class="fas fa-angle-right"></i>よくある質問</a></li>
          @guest
          <li>
            <a href="/application">講師に登録する</a>
          </li>

          @else
            @if (Auth::user()->role_id == 2 )
            <li>
              <a>
                <i class="fas fa-angle-right"></i>
              講師申請済
              </a>
            </li>
            @else
            <li>
              <a href="/application">講師に登録する</a>
            </li>
            @endif

          @endguest


        </ul>
      </nav>
    </div>
    @endguest
</footer>
