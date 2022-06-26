@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/schedule.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="shift-container">

    <div class="second-content">
      <div class="shift-table-head">
        <h1>週別シフト表</h1>
      </div>

      <table class="shift-table">
        <thead>
          <tr class="week-info">
            <th class="previous-week" colspan="2"><a href="/schedule/{{ $previousWeek }}"> << </a></th>
            <th class="this-month" colspan="4">{{ substr($thisWeek, 0, 4) . "年" . substr($thisWeek, 5, 2) . "月" }}</th>
            <th class="next-week" colspan="2"><a href="/schedule/{{ $nextWeek }}"> >> </a></th>
          </tr>
          <tr>
            <th></th>
            @foreach ( $week as $value )
              @if ( $value['day'] == date('Y-m-d') )
                @if ( $value['week_name'] == 'SAT')
                <th id="today" class="Sat">{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}</th>
                @elseif ( $value['week_name'] == 'SUN' )
                <th id="today" class="Sun">{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}</th>
                @else
                <th id="today">{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}</th>
                @endif
              @else
                @if ( $value['week_name'] == 'SAT')
                <th class="Sat">{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}</th>
                @elseif ( $value['week_name'] == 'SUN' )
                <th class="Sun">{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}</th>
                @else
                <th>{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}</th>
                @endif
              @endif
            @endforeach
          </tr>
        </thead>
        <tbody>
          @if (is_null($shift))
            @for ($i = 1 ; $i < 7 ; $i++ )
              <tr>
                <th class="period">{{ $i }}コマ目</th>
                @foreach ($week as $value)
                <th>
                  <p>-</p>
                </th>
                @endforeach
              </tr>
            @endfor
          @else
            @for ($i = 1 ; $i < 7 ; $i++ )
              <tr>
                <th class="period">{{ $i }}コマ目</th>
                @foreach ($week as $value)
                <th>
                  @if (($num = substr('0000000000'.decbin($shift[$value['week_name']]), -$i, 1)) == 1 )
                    <p class="possible">◎</p>
                  @else
                    <p>×</p>
                  @endif
                </th>
                @endforeach
              </tr>
            @endfor
          @endif

        </tbody>
      </table>
      <div class="shift-table-foot">
        @if (is_null($shift))
        <a href="/schedule/create/{{ $thisWeek }}">
          <img class="edit-icon" src="/img/icon_add.png" alt="shift edit" width="45px">
        </a>
        @else
        <a href="/schedule/{{ $shift->id }}/edit/{{ $shift->Monday_of_the_Week }}">
          <img class="edit-icon" src="/img/edit.png" alt="shift edit" width="45px">
        </a>
        @endif
        <a class="thisweek-a-tag" href="/home">
          <img class="thisweek-icon" src="/img/backtomypage.png" alt="back to this week" width="129px">
        </a>
      </div>

      @if (is_null($shift))
        <div class="mask">
          <h3>シフト未登録</h3>
        </div>
      @endif
    </div>

    <div class="third-content">
      <x-time-schedule-box />
    </div>

  </div>

</div>
@endsection
