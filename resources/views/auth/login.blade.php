@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/auth/login-form.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="login-container">
        <div class="logo-content">
            <img src="/img/logo_white@2x.png" alt="メディスタロゴ" width="300">
        </div>



        <div class="login-form-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mail-content">
                    <div class="mail-error-content">
                        <input id="email" type="email" class="input-form @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="メールアドレス" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="password-content">
                    <input id="password" type="password" class="input-form @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="パスワード">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="password-keep-content">
                    <div class="form-check text-center">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">ログイン情報を保存する</label>
                    </div>
                </div>

                <div class="login-btn-content">
                    <button type="submit" class="login-btn">ログイン</button>
                    @if (Route::has('password.request'))
                    <div class="text-right pr-5">
                        <a class="btn btn-link" style="font-size: 0.8em; " href="{{ route('password.request') }}">パスワードをお忘れの方はこちら</a>
                    </div>
                    @endif
                </div>
            </form>
            <div class="line-login links">
                <!-- <i class="fab fa-line"></i> -->
                <a href="/linelogin">
                    <button type="button" class="line-login-btn">
                        <i class="fab fa-line"></i>LINEでログイン
                    </button>
                </a>
            </div>

            <div class="register-content">
                <a href="{{ route('register') }}">
                    <button class="btn btn-primary w-75">新規登録</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection