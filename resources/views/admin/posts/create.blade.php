@extends('layouts.admin.app')

@section('content')
<!-- ここから -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1>
        <a href="{{ url('/home') }}" class="header-menu">HOME</a>
        質問する
      </h1>
      <form method="post" action="{{ url('/create_post') }}">
        {{ csrf_field() }}
        <p>
          <label for="">タイトル</label>
          <input type="text" name="title" placeholder="タイトル" value="{{ old('title') }}">
          @if ($errors->has('title'))
          <span class="error">{{ $errors->first('title') }}</span>
          @endif
        </p>
        <p>
          <label for="">科目</label>
          <select name="subject">
            @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
          </select>
        </p>
        <p>
          <label for="">詳細</label>
          <textarea name="text" placeholder="enter body">{{ old('text') }}</textarea>
          @if ($errors->has('text'))
          <span class="error">{{ $errors->first('text') }}</span>
          @endif
        </p>
        <p>
          <label for="">解説希望日にち</label>
          <input type="date" name="date" value="{{ old('date') }}">
        </p>
        <p>
          <label for="">コマ数</label>
          <input type="number" name="period" placeholder="int" min="1" max="3" value="{{ old('period') }}">
        </p>
        <p>
          <input type="submit" value="投稿する">
        </p>
      </form>


    </div>
  </div>
</div>
  <!-- ここまで -->

@endsection
