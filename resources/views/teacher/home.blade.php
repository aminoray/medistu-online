@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" media="screen and (min-width:1024px)">
<link rel="stylesheet" href="{{ asset('css/mypage_for_mobile.css') }}" media="screen and (max-width:480px)">
<link rel="stylesheet" href="{{ asset('css/mypage_for_tablet.css') }}" media="screen and (min-width:480px) and (max-width:1023px)">
@endsection

@section('content')

<div class="container" id="mypage">
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
      <x-posts-index-box title="解説履歴" />
    </div>

    <div class="content-second">
      <div class="content-second-left">
        <x-notify-box parameter="{{ $parameter ?? ' ' }}"/>
      </div>

      <div class="content-second-right">
        @if ($next_question)
        <a href="/posts/{{ $next_question->random_string }}">
        @else
        <a href="" onclick="noneQuestion()">
        @endif
        <button class="t-zoom" type="button" value="受講">
          <h3><i class="fas fa-video"></i> ZOOMを開く</h3>
          <h4>開始の5分前に押して待ちましょう</h4>
        </button>
        </a>
      </div>

    </div>

    <div class="content-third">
      <x-posts-index-box title="質問履歴" />
    </div>

    <div class="content-third-for-mobile">
      <x-side-shift-box />
    </div>

    <div class="content-fourth">
      <x-teacher-unspecified-box />
    </div>

  </div>
</div>

@endsection
