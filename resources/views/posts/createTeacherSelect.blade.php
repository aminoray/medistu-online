@extends('layouts.app')


@section('stylesheet')
<link href="{{ asset('css/posts.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- ここから -->
<div class="container">
  <div class="teacher-select-container">
    <div class="top-content">
      <img src="/img/アセット 3@2x.png" alt="icon">
      <h1>有料会員質問フォーム</h1>
    </div>

    <div class="breadcrumbs">
      <ul class="bread">
        <li><a href="/newcreate">①質問内容</a></li>
        <li class="current"><a>②講師指定</a></li>
        <li><a>③時間指定</a></li>
      </ul>
    </div>

    <div class="second-content">
      <div class="teacher-select-table-head">
        <img src="/img/icon_user_1@2x.png" alt="ユーザーアイコン">
        <h3>メディスタ講師一覧</h3>
      </div>

      <table class="teacher-select-table">
        <tbody>
          @foreach ($teachers as $teacher)
            @foreach ($ids as $id)
              @if ( $teacher->id == $id->teacher_id )
              <tr>
                <th class="img">
                  <img src="{{ $teacher->image_path }}" alt="user icon">
                </th>
                <th class="name">
                  <p>金沢大学</p>
                  <h3>{{ $teacher->name }}</h3>
                </th>
                <!-- <th class="evaluation">★★★★☆　4.0</th> -->
                <!-- <th class="detail" id="teacher-open" onclick="openModal('teacher-{{$teacher->id }}')">
                  <input type="submit" value="詳細">
                </th> -->
                <th class="select">
                  <form method="post" action="/newcreate/teacher/{{$teacher->id}}">
                    {{ csrf_field() }}
                    <input type="submit" value="選択" class="btn btn-success btn-sm">
                  </form>
                </th>
              </tr>
              @endif
            @endforeach
          @endforeach
        </tbody>
      </table>
      <div class="none-select">
        <!-- <a method="post" action="/create_teacher/0">
          <button type="button" name="button">
            <img src="/img/icon_noteature@2x.png" alt="">
            <p>講師指定なしで次へ</p>
          </button>
        </a> -->
        <form method="post" action="/newcreate/teacher/0">
          {{ csrf_field() }}
          <!-- <input type="submit" value="選択" class="btn btn-success btn-sm"> -->
          <button type="submit" name="button">
            <img src="/img/icon_noteature@2x.png" alt="">
            <p>講師指定なしで次へ</p>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>


<script src="js/main.js"></script>

@endsection
