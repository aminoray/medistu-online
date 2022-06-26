@extends('layouts.app')


@section('stylesheet')
<link href="{{ asset('css/teacher-detail.css') }}" rel="stylesheet">
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
            << </p>
          </div>  -->
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
            <p>ユーザー区分</p>講師
          </li>
          <li>
            <p>zoomリンク</p>
            @if (Auth::user()->teacherDetail->zoom_url)
            登録済み
            @else
            未登録
            @endif
          </li>

          <li>
            <p>居住地</p>{{ Auth::user()->teacherDetail->prefecture }}
          </li>
          <li>
            <p>大学</p>{{ Auth::user()->teacherDetail->college_name }}
          </li>
          <li>
            <p>学部</p>{{ Auth::user()->teacherDetail->department }}
          </li>
          <li>
            <p>学科</p>{{ Auth::user()->teacherDetail->major }}
          </li>
          <li>
            <p>登録日</p>
            {{ substr(Auth::user()->created_at, 0, 4) }}/{{ substr(Auth::user()->created_at, 5, 2) }}/{{ substr(Auth::user()->created_at, 8, 2) }}
          </li>
        </ul>

        <div class="border"></div>

        <p id="available-title">対応可能科目</p>
        <ul class="available-sub">
          <li>
            <p>小学生</p><br>国語, 英語, 理科, 社会, 算数
          </li>
          <li>
            <p>中学生</p><br>国語, 数学, 英語, 理科, 社会
          </li>
          <li>
            <p>高校生</p><br>国語, 英語, 数学Ⅰ, 数学Ⅱ, 数学Ⅲ, 数学A, 数学B, 物理, 化学, 生物, 地学, 世界史, 日本史, 倫理, 地理, 現代社会, 政治経済
          </li>
        </ul>
        </li>
      </div>
    </div>

  </div>

  <div class="second-content">

  </div>

</div>

</div>
<!--
<div class="card">
  <div class="card-header bg-warning">
    <h3>詳細情報</h3>
  </div>
  <p>名前: {{ Auth::user()->teacherDetail->full_name }}</p>
  <p>よみ: {{ Auth::user()->teacherDetail->name_kana }}</p>
  <p>都道府県: {{ Auth::user()->teacherDetail->prefecture }}</p>
  <p>大学: {{ Auth::user()->teacherDetail->college_name }}</p>
  <p>学部: {{ Auth::user()->teacherDetail->department }}</p>
  <p>学科: {{ Auth::user()->teacherDetail->major }}</p>
  <p>学年: {{ Auth::user()->teacherDetail->grade }}</p>
  <h3>対応可能科目一覧</h3>
  <div class="row">
    @php
        $grade_name = array('高校生', '中学生', '小学生');
    @endphp
    @for ($i = 1 ; $i < 4 ; $i++)
      <div class="col-md-4 py-3 px-3">
      <h3>{{ $grade_name[$i-1] }}</h3>
      @foreach ($subjects as $subject)
        @if ( $subject->id !== 22 )
          @if (($num = substr('0000'.decbin($subject->grade_id), -$i, 1)) == 1 )
            @if (Auth::user()->teacherDetail["subject_id_".$subject->id] >= 4 - $i)
              <p>{{ $subject->name }} : ○</p>
            @else
              <p>{{ $subject->name }} : ×</p>
            @endif
          @endif
        @endif
      @endforeach
      </div>
    @endfor
  </div>
</div> -->
@endsection
