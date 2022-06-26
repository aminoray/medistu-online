
@extends('layouts.admin.app')

@section('stylesheet')
<link href="{{ asset('css/posts.css') }}" rel="stylesheet">

@endsection

@section('content')
<!-- ここから -->
<div class="container">
  <div class="posts-create-container">
    <div class="top-content">
      <img src="/img/アセット 3@2x.png" alt="icon">
      <h1>最新の情報の追加</h1>
    </div>

    <div class="second-content">

      <div class="input-form">
        <form method="post" action="{{ url('/admin/info/content') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="section">
            <label for="">タイトル</label>
            <input type="text" name="title" placeholder="タイトル" value="{{ old('title') }}">
            @if ($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
            @endif
          </div>

          <div class="section">
            <label for="">カテゴリー </label>
            <select name="category">
              <option value="none" hidden>カテゴリーを選択</option>
              <option value="1">お知らせ</option>
              <option value="2">重要</option>
            </select>
          </div>

          <div class="section">
            <label for="">お知らせ内容</label>
            <!-- <input id="filepond" type="file" class="my-pond" name="filepond"/> -->
            <textarea name="body" placeholder="最新の情報を入力">{{ old('text') }}</textarea>
            @if ($errors->has('text'))
            <span class="error">{{ $errors->first('text') }}</span>
            @endif
          </div>
          <div class="submit">
            <input id="next-btn" type="submit" value="NEXT">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <!-- ここまで -->

@endsection
