@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/posts.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

@endsection

@section('content')
<!-- ここから -->
<div class="container">
  <div class="posts-create-container">
    <div class="top-content">
      <img src="/img/アセット 3@2x.png" alt="icon">
      @if (Auth::user()->studentDetail->student_status == 2)
      <h1>有料会員質問フォーム</h1>
      @elseif (Auth::user()->studentDetail->student_status == 3)
      <h1>提携塾生質問フォーム</h1>
      @endif
    </div>

    <div class="breadcrumbs">
      <ul class="bread">
        <li class="current"><a>①質問内容</a></li>
        <li><a>②講師指定</a></li>
        <li><a>③時間指定</a></li>
      </ul>
    </div>

    <div class="second-content">
      <div class="input-form">
        <form method="post" action="{{ url('/newcreate/content') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="section">
            @if (Auth::user()->studentDetail->student_status == 2)
            <label for="">問題タイトル</label>
            <input type="text" name="title" placeholder="タイトル" value="{{ old('title') }}">
            @if ($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
            @endif
            @elseif (Auth::user()->studentDetail->student_status == 3)
            <label for="">カテゴリー</label>
            <select name="subject">
              <option value="none" hidden>カテゴリーを選択</option>
                <option value="23">授業の質問</option>
                <option value="24">グループ質問</option>
            </select>
            @if ($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
            @endif
            @endif

          </div>
          <div class="section">
            <label for="">科目</label>
            <select name="subject">
              <option value="none" hidden>科目を選択</option>
              @if (Auth::user()->studentDetail->student_status == 2)
                @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
              @elseif (Auth::user()->studentDetail->student_status == 3)
                <option value="23">授業の質問</option>
                <option value="24">グループ質問</option>
              @endif

            </select>
          </div>
          <div class="section">
            <label for="">質問内容</label>
            <!-- <input type="file" name="datafile"> -->
            <input id="filepond" type="file" class="my-pond" name="filepond" multiple/>
            <textarea name="text" placeholder="詳細を入力してください">{{ old('text') }}</textarea>
            @if ($errors->has('text'))
            <span class="error">{{ $errors->first('text') }}</span>
            @endif
          </div>
          <div class="submit">
            <input type="hidden" name="random_string" value="{{ $random_string }}">
            <input id="next-btn" type="submit" value="NEXT">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- ここまで -->

<script>


  filepondOptions = {
    labelIdle: '写真を追加',
    stylePanelLayout: 'compact',
    server: {
      url: '',
      timeout: 20000,
      process: {
        url: '/medifile/upload/{{ $random_string }}',
        method: 'POST',
        onload: (response) => {
            console.log('TEST LOAD: ', response);
        return true;
        },
      },
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    }
  };
  $('.my-pond').filepond(filepondOptions);

</script>

@endsection
