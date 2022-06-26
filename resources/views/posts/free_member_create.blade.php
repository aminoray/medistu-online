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
      <h1>無料会員質問フォーム</h1>
    </div>

    <div class="second-content">
      <div class="description">
        <img src="/img/zoom-and-pc.png" alt="zoom-img" width="400px">
        <h3 class="description-head">わからない問題を質問してみよう！</h3>
        <p class="description-text01">わからない問題の写真をとってしたの質問投稿フォームに添付して投稿してください。 学年や質問する問題の教科も正しく選択していただけると解説がスムーズに行えますの でご協力お願いします。</p>
        <p class="description-text02">※一回の質問につき1問でお願いします。皆様にご利用していただくために解説は15分を目安に行います。 また、問題を投稿する際にその問題の解答解説も併せて投稿していただくようお願いします。</p>
        <img src="/img/paying_member_long@2x.png" alt="ad" width="592px">
      </div>

      <div class="input-form">
        <form method="post" action="{{ url('/newcreate/content') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="section">
            <label for="">問題タイトル</label>
            <input type="text" name="title" placeholder="タイトル" value="{{ old('title') }}">
            @if ($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
            @endif
          </div>
          <div class="section">
            <label for="">科目</label>
            <select name="subject">
              <option value="none" hidden>科目を選択</option>
              @foreach ($subjects as $subject)
              <option value="{{ $subject->id }}">{{ $subject->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="section">
            <label for="">質問内容</label>
            <input id="filepond" type="file" class="my-pond" name="filepond"/>
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
