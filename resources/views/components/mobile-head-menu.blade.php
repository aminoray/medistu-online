<div class="user-info">
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
<div class="user-menus">
  <div class="zoom-btn">
    @if ($next_question)
    <a href="/posts/{{ $next_question->random_string }}">
    @else
    <a href="" onclick="noneQuestion()">
    @endif
      <img src="/img/icon_chat@2x.png" alt="zoom icon">
      @if (Auth::user()->role_id == 2 )
      <h2>質問を解説する</h2>
      @else
      <h2>解説を受講する</h2>
      @endif
    </a>
  </div>
  <div class="sec-menus">
    <div class="post">
      <a href="/posts/index">
        <img src="/img/アセット 3@2x.png" alt="post">
        <h3>質問一覧</h3>
      </a>
    </div>
    <div class="count">
      <a>
        @if (Auth::user()->role_id == 2 )
        <h3>今月の解説回数</h3>
        @else
        <h3>今月の質問回数</h3>
        @endif
        <h2>{{ $count ?? ''}}回</h2>
      </a>
    </div>
  </div>

</div>
　