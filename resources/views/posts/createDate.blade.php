@extends('layouts.app')


@section('stylesheet')
<link href="{{ asset('css/posts.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- ここから -->

<div class="container">
  <div class="date-select-container">
    <div class="top-content">
      <img src="/img/アセット 3@2x.png" alt="icon">
      @if (Auth::user()->studentDetail->student_status == 1)
      <h1>無料会員質問フォーム</h1>
      @else
      <h1>有料会員質問フォーム</h1>
      @endif
    </div>

    @if (Auth::user()->studentDetail->student_status == 2)
    <div class="breadcrumbs">
      <ul class="bread">
        <li><a href="/newcreate">①質問内容</a></li>
        <li><a href="/create_teacher">②講師指定</a></li>
        <li class="current"><a>③時間指定</a></li>
      </ul>
    </div>
    @endif

    <div class="second-container">
      @if (Auth::user()->studentDetail->student_status == 1)
      <div class="description">
        <img src="/img/paying_member_long@2x.png" alt="ad" width="592px">
      </div>
      @else
      <div class="teacher">
        @if (App\User::find($id))
        <div class="teacher-icon">
          <img src="{{ App\User::find($id)->image_path }}" alt="user icon">
        </div>
        <div class="teacher-info">
          <h3>{{ App\User::find($id)->name }}</h3>
          <p>予約選択可能な日程</p>
        </div>
        @else
        <div class="teacher-info">
          <h3>講師未選択</h3>
        </div>
        @endif
      </div>
      @endif
    </div>

    <div class="third-container">

      <div class="tab-wrap">
      @for ($i = 1 ; $i < 7 ; $i++ )
      <!-- ここからーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->
      @if (Auth::user()->studentDetail->student_status == 1)
        @if ($i === 5)
          <input id="TAB-{{$i}}" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-{{$i}}">{{$i}}コマ目</label>
        @else
          <input id="TAB-{{$i}}" type="radio" name="TAB" class="tab-switch" /><label class="tab-label" for="TAB-{{$i}}">{{$i}}コマ目</label>
        @endif
      @else
        @if ($i === $nowPeriod)
          <input id="TAB-{{$i}}" type="radio" name="TAB" class="tab-switch" checked="checked" /><label class="tab-label" for="TAB-{{$i}}">{{$i}}コマ目</label>
        @else
          <input id="TAB-{{$i}}" type="radio" name="TAB" class="tab-switch"/><label class="tab-label" for="TAB-{{$i}}">{{$i}}コマ目</label>
        @endif
      @endif
        <div class="tab-content">
          <table class="date-select-table">
            <thead>
              <tr class="week-info">
                <th class="previous-week" colspan="2"><a href="/newcreate/date/{{ $previousWeek }}"> << </a></th>
                <th class="this-month" colspan="4">{{ substr($thisWeek, 0, 4) . "年" . substr($thisWeek, 5, 2) . "月" }}</th>
                <th class="next-week" colspan="2"><a href="/newcreate/date/{{ $nextWeek }}"> >> </a></th>
              </tr>
              <tr>
                <th>{{$i}}コマ目</th>
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
                @for ($j = (4 * $i) - 4 ; $j < (4 * $i) ; $j ++)
                  <tr>
                    <th class="time">{{ $time[$j] }}</th>
                    @foreach ($week as $value)
                    <th class="hover">
                      @if ( $value['day'] < date('Y-m-d') )
                        -
                      @else
                        @if ( $value['day'] === date('Y-m-d') && date("H:i",strtotime("+30 minute")) > $time[$j] )
                          -
                        @else
                          @if (Auth::user()->studentDetail->student_status == 1)
                            @if ($i == 5 && ($value['week_name'] == 'MON' || $value['week_name'] == 'WED' || $value['week_name'] == 'SAT'))
                            <form method="post" action="/newcreate/post">
                              {{ csrf_field() }}
                              <input type="hidden" name="period" value="{{ $i }}">
                              <input type="hidden" name="time" value="{{ $time[$j] }}">
                              <input type="hidden" name="date" value="{{ $value['day'] }}">
                              <button type="submit" value="選択">◎</button>
                            </form>
                            @else
                            ×
                            @endif
                          @else
                            @if ($id == 0)
                              <form method="post" action="/newcreate/post">
                                {{ csrf_field() }}
                                <input type="hidden" name="period" value="{{ $i }}">
                                <input type="hidden" name="time" value="{{ $time[$j] }}">
                                <input type="hidden" name="date" value="{{ $value['day'] }}">
                                <button type="submit" value="選択">◎</button>
                              </form>
                            @else
                             ×
                            @endif
                          @endif
                        @endif
                      @endif
                    </th>
                    @endforeach
                  </tr>
                @endfor
              @else
                @for ($j = (4 * $i) - 4 ; $j < (4 * $i) ; $j ++)
                <tr>
                  <th>{{ $time[$j] }}</th>
                  @foreach ($week as $value)
                  <th>
                    @if ( $value['day'] < date('Y-m-d') )
                      -
                    @else
                      @if ( $value['day'] === date('Y-m-d') && date("H:i",strtotime("+30 minute")) > $time[$j] )
                        -
                      @else
                        @if (($num = substr('0000000000'.decbin($shift[$value['week_name']]), -$i, 1)) == 1 )
                          <form method="post" action="/newcreate/post">
                            {{ csrf_field() }}
                            <input type="hidden" name="period" value="{{ $i }}">
                            <input type="hidden" name="time" value="{{ $time[$j] }}">
                            <input type="hidden" name="date" value="{{ $value['day'] }}">
                            <button class="btn" type="submit" value="選択">◎</button>
                          </form>
                        @else
                          ×
                        @endif
                      @endif
                    @endif
                  </th>
                  @endforeach
                </tr>
                @endfor
              @endif
            </tbody>
          </table>
        </div>
      <!-- ここまでーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->
      @endfor
      </div>
      <div class="date-select-table-foot">
        <a href="/newcreate/date/{{ date('Y-m-d') }}">
          <img src="/img/thisweek.png" alt="back to this week" width="129px">
        </a>
      </div>
    </div>

    <div class="fourth-container">
      <x-time-schedule-box />
    </div>
  </div>
</div>
  <!-- ここまで -->

@endsection
