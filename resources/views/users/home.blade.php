@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" media="screen and (min-width:1024px)">
<link rel="stylesheet" href="{{ asset('css/mypage_for_mobile.css') }}" media="screen and (max-width:480px)">
<link rel="stylesheet" href="{{ asset('css/mypage_for_tablet.css') }}" media="screen and (min-width:481px) and (max-width:1023px)">
<!-- slick -->
<link rel="stylesheet" type="text/css" href="css/slick.css">
<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
@endsection

@section('content')


<div class="container">
  <div class="left">
    <x-sidebar />
  </div>
  <div class="contents">
    <div class="content-top">
      <h1>{{ Auth::user()->name }}さんのマイページ</h1>
    </div>
    <div class="content-top-for-mobile">
      <x-mobile-head-menu />
    </div>

    <div class="content-second-mobile">
      @if (!isset(Auth::user()->studentDetail->student_status))
      <div class="premium_student_application">
        <a href="/premium_student_application" class="btn-square-pop">
          <img src="/img/banner_mobile.png" alt="有料会員登録">
        </a>
      </div>
      @else
        @if (Auth::user()->studentDetail->student_status == 1)
          <div class="premium_student_application">
            <a href="/premium_student_application" class="btn-square-pop">
              <img src="/img/banner_mobile.png" alt="有料会員登録">
            </a>
          </div>
        @endif
      @endif
      <x-posts-index-box title="最近の投稿" />
    </div>

    <div class="content-second">
      <div class="content-second-left">
        <x-notify-box parameter="{{ $parameter ?? '' }}" />
      </div>

      <div class="content-second-right">
        <a class="newcreat-btn" href="/newcreate">
          <button class="question-btn" type="button" value="質問">
            <div class=button-q-img>
              <img src="/img/s-1.png">
            </div>
            <h3 class="q-b-t">質問を投稿する</h3>
            <p class="fukidashi">解説して欲しい問題を投稿しましょう</p>
          </button>
        </a>
      </div>

      <div class="content-second-right">
        @if ($next_question)
        <a href="/posts/{{ $next_question->random_string }}">
        @else
        <a href="" onclick="noneQuestion()">
        @endif
        <button class="question-btn" type="button" value="受講">
            <div class=button-a-img>
              <img src="/img/s-2.png">
            </div>
          <h3 class="q-b-t">解説を受講する</h3>
          <p class="fukidashi2">時間になったらZoomで受講できます</p>
        </button>
        </a>
        <!-- <a class="newcreat-btn" href="/newcreate">
          <button class="question-btn" type="button" value="受講" />
            <h3><i class="fas fa-video"></i> 解説を受講する</h3>
          </button>
        </a> -->
      </div>
    </div>

    <div class="content-third">
      <x-posts-index-box title="質問履歴" />
    </div>


    

  </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!-- <script src="medistuonline-laravel/resources/js/slick.js" type="text/javascript" charset="utf-8"></script> -->

    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/toppage.js') }}"></script>


@endsection
