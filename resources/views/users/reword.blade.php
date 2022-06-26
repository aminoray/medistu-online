@extends('layouts.app')


@section('stylesheet')
<link href="{{ asset('css/reword.css') }}" rel="stylesheet">
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
          </div>
        </div>

      </div>

      <div class="top-middle">
        <div class="pre">
          <!-- <p class="arrow-mark">
            <<
          </p> -->
        </div>
        <div class="count">
              @if (Auth::user()->role_id == 2 )
              <h3>今月の講師報酬</h3>
              @else
              <h3>今月の支払額</h3>
              @endif
              <h2>{{ $count ?? ''}}円</h2>
        </div>
        <!-- <div class="next">
          <p class="arrow-mark"> >> </p>
        </div> -->
      </div>

    </div>
  </div>

</div>
@endsection
