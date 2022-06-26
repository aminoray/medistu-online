@extends('layouts.admin.app')

@section('content')
<!-- ここから -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1>
        <a href="{{ url('/home') }}" class="header-menu">HOME</a>
        質問を編集する
      </h1>
      <h3>{{ $post->title }}</h3>
      <h3>{{ $post->users->name }}</h3>
      <form method="post" action="{{ url('/posts', $post->id ) }}">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <p>
          <label for="">タイトル</label>
          <input type="text" name="title" placeholder="タイトル" value="{{ old('title', $post->title) }}">
          @if ($errors->has('title'))
          <span class="error">{{ $errors->first('title') }}</span>
          @endif
        </p>
        <p>
          <label for="">科目</label>
          <select name="subject">
            @foreach ($subjects as $subject)
              @if ($subject->id == $post->subject)
                <option value="{{ $subject->id }}" selected>{{ $subject->name }}</option>
              @else
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
              @endif
            @endforeach
          </select>
        </p>
        <p>
          <label for="">詳細</label>
          <textarea name="text" placeholder="enter body">{{ old('text', $post->text) }}</textarea>
          @if ($errors->has('text'))
          <span class="error">{{ $errors->first('text') }}</span>
          @endif
        </p>
        <p>
          <label for="">解説希望日にち</label>
          <input type="date" name="date" value="{{ old('date', $post->date )}}">
        </p>
        <p>
          <label for="">コマ数</label>
          <input type="number" name="period" placeholder="int" min="1" max="3" value="{{ old('period', $post->period) }}">
        </p>
        <p>
          <input type="submit" value="更新する">
        </p>
      </form>
    </div>
  </div>
</div>
  <!-- ここまで -->

@endsection
