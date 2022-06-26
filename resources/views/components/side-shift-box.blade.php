<div class="shift-side-container">
  <a href="/schedule/{{ date('Y-m-d') }}">
    <p>今週のシフト</p>
  </a>
  <table class="shift-side">
    <thead>
      <tr>
        <th class="period"></th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
        <th>日</th>
      </tr>
    </thead>
    
    @if ($shift->isEmpty())
      <tbody>
        @for ($i = 1 ; $i < 7 ; $i++)
          <tr>
            <th class="period">{{ $i }}コマ</th>
            @for ($i = 0 ; $i < 7 ; $i++)
            <th>
            </th>
            @endfor
          </tr>
        @endfor
      </tbody>

      <a href="/schedule/{{ date('Y-m-d') }}">
        <div class="shift-isnull-content">
          <h3>今週のシフトが未登録です。</h3>
        </div>
      </a>
    @else
      <tbody>
        @for ($i = 1 ; $i < 7 ; $i++)
          <tr>
            <th class="period">{{ $i }}コマ</th>
            @foreach ($weekName as $value)
            <th>
              @if (($num = substr('0000000000'.decbin($shift->first()->$value), -$i, 1)) == 1 )
                ●
              @endif
            </th>
            @endforeach
          </tr>
        @endfor


      </tbody>
    @endif
  </table>
  <a href="/schedule/{{ date('Y-m-d') }}">
    <p class="side-shift-bottom-bottun">シフトを編集</p>
  </a>
</div>
