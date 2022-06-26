@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/schedule.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="shift-container">

    <div class="second-content">
        <div class="shift-table-head">
          <h1>シフト登録</h1>
        </div>

        <form method="post" action="{{ url('/schedule_create') }}" name="shiftform">
          {{ csrf_field() }}
          <input type="hidden" name="dayOfMOnday" value="{{ $dayMon }}">
          <table class="shift-table">
            <thead>
              <tr class="week-info">
                <th class="this-month" colspan="8">{{ substr($dayMon, 0, 4) . "年" . substr($dayMon, 5, 2) . "月" }}</th>
              </tr>
              <tr>
                <th>
                  <label for="checkbox">
                  <input id="checkbox" class="all-checkbox" type="checkbox" name="all" onClick="AllChecked();" />
                  <p class="all">すべてを選択</p>
                  <p class="none hidden" id="none">選択解除</p>
                  </label>
                </th>
                @php
                  $num = 3;
                @endphp

                @foreach ( $week as $value )
                  @if ( $value['day'] == date('d') )
                    @if ( $value['week_name'] == 'SAT')
                    <th id="today" class="Sat">
                      <label for="{{ "checkbox" . 'day_'.$value['week_name'] }}">
                      <input id="{{ "checkbox" . 'day_'.$value['week_name'] }}" class="day-checkbox" type="checkbox" name="dayall" onClick="dayChecked({{$num}});" />{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}
                      </label>
                    </th>
                    @elseif ( $value['week_name'] == 'SUN' )
                    <th id="today" class="Sun">
                      <label for="{{ "checkbox" . 'day_'.$value['week_name'] }}">
                      <input id="{{ "checkbox" . 'day_'.$value['week_name'] }}" class="day-checkbox" type="checkbox" name="dayall" onClick="dayChecked({{$num}});" />{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}
                      </label>
                    </th>
                    @else
                    <th id="today">
                      <label for="{{ "checkbox" . 'day_'.$value['week_name'] }}">
                      <input id="{{ "checkbox" . 'day_'.$value['week_name'] }}" class="day-checkbox" type="checkbox" name="dayall" onClick="dayChecked({{$num}});" />{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}
                      </label>
                    </th>
                    @endif
                  @else
                    @if ( $value['week_name'] == 'SAT')
                    <th class="Sat">
                      <label for="{{ "checkbox" . 'day_'.$value['week_name'] }}">
                      <input id="{{ "checkbox" . 'day_'.$value['week_name'] }}" class="day-checkbox" type="checkbox" name="dayall" onClick="dayChecked({{$num}});" />{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}
                      </label>
                    </th>
                    @elseif ( $value['week_name'] == 'SUN' )
                    <th class="Sun">
                      <label for="{{ "checkbox" . 'day_'.$value['week_name'] }}">
                      <input id="{{ "checkbox" . 'day_'.$value['week_name'] }}" class="day-checkbox" type="checkbox" name="dayall" onClick="dayChecked({{$num}});" />{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}
                      </label>
                    </th>
                    @else
                    <th>
                      <label for="{{ "checkbox" . 'day_'.$value['week_name'] }}">
                      <input id="{{ "checkbox" . 'day_'.$value['week_name'] }}" class="day-checkbox" type="checkbox" name="dayall" onClick="dayChecked({{$num}});" />{{ substr($value['day'], 8, 2) . "日" . "(" . $value['week_name_ja'] . ")" }}
                      </label>
                    </th>
                    @endif
                  @endif

                  @php
                   $num++;
                  @endphp
                @endforeach
              </tr>
            </thead>
            <tbody>
              @for ($i = 1 ; $i < 7 ; $i++ )
                <tr>
                  <th class="period">
                    <label for="{{ "checkbox" . 'period_'.$i }}">
                    <input id="{{ "checkbox" . 'period_'.$i }}" class="period-checkbox" type="checkbox" name="periodall" onClick="periodChecked({{$i}});" />{{ $i }}コマ目
                    </label>
                  </th>
                  @foreach ($week as $value)
                  <th>
                    <input type="hidden" name="{{ $value['week_name'].'_'.$i }}" value="0">
                    <label for="{{ "checkbox" . $value['week_name'].'_'.$i }}">
                    <input id="{{ "checkbox" . $value['week_name'].'_'.$i }}" type="checkbox" name="{{ $value['week_name'].'_'.$i }}" value="{{ $num = pow(2, $i-1) }}" onClick="DisChecked();" />
                    </label>
                  </th>
                  @endforeach
                </tr>
              @endfor
            </tbody>
          </table>
          <div class="table-foot">
            <input class="submit-btn" type="submit" value="登録">
          </div>
        </from>
      </div>

    <div class="third-content">
      <x-time-schedule-box />
    </div>

  </div>
</div>

<script src="{{ asset('/js/shift.js') }}"></script>

@endsection
