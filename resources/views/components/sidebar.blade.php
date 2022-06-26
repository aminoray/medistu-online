
<!-- Sidebar -->
<div class="sidebar">
    <div class="user-profeel">
        <div class="user-img">
            <img src="{{ Auth::user()->image_path }}" alt="ユーザーアイコン">
        </div>
        <div class="user-name">
            <a href="/user/{{ Auth::user()->id }}/detail">{{ Auth::user()->name }}</a>
            <a href="/user/{{ Auth::user()->id }}/detail"><i class="fas fa-cog"></i></a>
            <p class="user-level">
              @if (Auth::user()->role_id == 1 )
              管理者
              @elseif (Auth::user()->role_id == 2 )
              講師
              @elseif (Auth::user()->role_id == 3 )
                @if (!isset(Auth::user()->studentDetail->student_status))
                  無料会員
                @else
                  @if (Auth::user()->studentDetail->student_status == 1)
                  無料会員
                  @elseif (Auth::user()->studentDetail->student_status == 2)
                  有料会員
                  @elseif (Auth::user()->studentDetail->student_status == 3)
                  提携塾生
                  @endif
                @endif
              @else
              none role
              @endif
            </p>
        </div>
    </div>
    <div class="sidebar-bottom">
            @if (Auth::user()->role_id == 2)
            <x-side-shift-box />
            @endif
            <ul class="sidebar-contents">
                <li>
                  <a href="/user/{{ Auth::user()->id }}/detail"><p>アカウント情報</p></a>
                </li>
                <!-- <li>
                  <a href="/user/{{ Auth::user()->id }}/detail"><p>アカウント情報</p></a>
                </li> -->
                <li>
                  @if (Auth::user()->role_id == 2)
                    <a href="/reword"><p>収益情報</p></a>
                  @else
                    <!-- <a href="/reword"><p>支払情報</p></a> -->
                  @endif
                </li>
                <!-- <li><p>ガイドライン</p></li> -->
                @if (Auth::user()->email !== Auth::user()->user_id.'@line.medistu-online.jp')
                @endif
            </ul>
        @if (Auth::user()->role_id == 3)
          @if (!isset(Auth::user()->studentDetail->student_status))
          <div class="sidebar-add">
              <img src="img/paying_member@2x.png" alt="">
          </div>
          <div class="upgrade-resistration-btn">
              <a href="/premium_student_application" class="btn-square-pop">有料会員登録</a>
          </div>
          @else
            @if (Auth::user()->studentDetail->student_status == 1)
            <div class="sidebar-add">
                <img src="img/paying_member@2x.png" alt="">
            </div>
            <div class="upgrade-resistration-btn">
                <a href="/premium_student_application" class="btn-square-pop">有料会員登録</a>
            </div>
            @endif
          @endif
        @endif
    </div>
</div>
