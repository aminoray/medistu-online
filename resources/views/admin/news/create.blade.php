@extends('layouts.admin.app')

@section('content')
<!-- ここから -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1>
        お知らせ作成
      </h1>
      <form method="post" action="{{ url('/admin/news/create') }}">
        {{ csrf_field() }}
        <p>
          <label for="">タイトル</label>
          <input type="text" name="title" placeholder="タイトル" value="{{ old('title') }}">
          @if ($errors->has('title'))
          <span class="error">{{ $errors->first('title') }}</span>
          @endif
        </p>
        <p>
          <label for="">内容</label>
          <textarea name="body" placeholder="enter body">{{ old('body') }}</textarea>
          @if ($errors->has('body'))
          <span class="error">{{ $errors->first('body') }}</span>
          @endif
        </p>

        @for ($i = 1 ; $i < 4 ; $i++ )
          <input type="hidden" name="{{ strval($i) }}" value="0">
        @endfor

        <p>
          <label for="">対象</label>
          <!-- チェックされたときだけ値を代入 -->
          <input type="checkbox" name="1" value="1">講師
          <input type="checkbox" name="2" value="2">有料会員
          <input type="checkbox" name="3" value="4">無料会員
        </p>

        <p>
          <input type="submit" value="NEXT">
        </p>
      </form>

    </div>
  </div>
</div>
  <!-- ここまで -->

@endsection
