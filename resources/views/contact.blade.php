
 @extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/contact.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
  <div class="contact-contents">
    <h1>お問い合わせ</h1>
    <form action="{{ url('/contact/store') }}" method="POST">
      @csrf
      <div class="form">
        <label for="">名前</label>
        <input type="text" name="name" placeholder="名前" value="{{ old('name') }}">
        @if ($errors->has('name'))
        <span class="error">{{ $errors->first('name') }}</span>
        @endif
      </div>

      <div class="form">
        <label for="">メールアドレス</label>
        <input type="text" name="email" placeholder="example@medistu.com" value="{{ old('email') }}">
        @if ($errors->has('email'))
        <span class="error">{{ $errors->first('email') }}</span>
        @endif
      </div>

      <div class="form">
        <label for="">件名</label>
        <input type="text" name="subject" placeholder="件名" value="{{ old('subject') }}">
        @if ($errors->has('subject'))
        <span class="error">{{ $errors->first('subject') }}</span>
        @endif
      </div>

      <div class="form">
        <label for="">内容</label>
        <textarea name="text" placeholder="内容を入力してください" rows="8" cols="80">{{ old('text') }}</textarea>
        @if ($errors->has('text'))
        <span class="error">{{ $errors->first('text') }}</span>
        @endif
      </div>

      <div class="submit">
        <input class="submit-btn" type="submit" value="送信">
      </div>
    </form>

  </div>


</div>

@endsection
