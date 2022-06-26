@extends('layouts.app')


@section('stylesheet')
<link href="{{ asset('css/user-detail.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
  <div class="detail-container">
    <div class="top-content">
      <div class="top-head">
        <img src="{{ Auth::user()->image_path }}" alt="ユーザーアイコン">
        <div class="user-name">
          <h3>{{ Auth::user()->name }}</h3>
          <div class="edit">
            <a href="/user/{{ Auth::user()->id }}/edit">
              <button class="edit-button" type="button" name="edit-button"><i class="fas fa-fw fa-wrench"></i>編集</button>
            </a>
          </div>
        </div>

      </div>

      <div class="top-middle">
        <!-- <div class="pre">
          <p class="arrow-mark">
            <<
          </p>
        </div> -->
        <div class="count">
              @if (Auth::user()->role_id == 2 )
              <h3>今月の解説回数</h3>
              @else
              <h3>今月の質問回数</h3>
              @endif
              <h2>{{ $count ?? ''}}回</h2>
        </div>
        <!-- <div class="next">
          <p class="arrow-mark"> >> </p>
        </div> -->
      </div>

      <div class="top-foot">
        <ul>
          <li>
            <p>ユーザー区分</p>生徒
          </li>
          <li>
            <p>居住地</p>{{ Auth::user()->studentDetail->prefecture }}
          </li>
          <li>
            <p>登録日</p>
            {{ substr(Auth::user()->created_at, 0, 4) }}/{{ substr(Auth::user()->created_at, 5, 2) }}/{{ substr(Auth::user()->created_at, 8, 2) }}
          </li>
        </ul>
      </div>
    </div>
    <div class="second-content">

    </div>

  </div>

</div>
@endsection
