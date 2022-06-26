@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/auth/register-form.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="register-container">
        <div class="image-container">
            <img src="/img/logo_white@2x.png" alt="メディスタロゴ" width="300">
        </div>

        <div class="register-form-content">
            <h3>新規登録</h3>

            <div class="input-content">
                <div class="notes">
                    <p><span class="asterisk">*</span>印の項目は必須項目です。必ずご記入願います。</p>
                    <p>※英数字は全て半角でご記入ください。</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                  @csrf
                    <table class="input-form-table">
                        <tr class="form-group">
                            <th>名前<span class="asterisk">*</span></th>

                            <td class="input-form">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>

                        <tr class="form-group">
                            <th>ユーザー名<span class="asterisk">*</span></th>

                            <td class="input-form">
                                <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" required>

                                @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>

                        <tr class="form-group">
                            <th>メールアドレス<span class="asterisk">*</span></th>

                            <td class="input-form">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>

                        <tr class="form-group">
                            <th>パスワード<span class="asterisk">*</span></th>

                            <td class="input-form">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>

                        <tr class="form-group">
                            <th>パスワード<span class="asterisk">*</span><br>(確認用)</th>

                            <td class="input-form">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </td>
                        </tr>
                    </table>

                    <div class="form-group">
                        <button type="submit" class="register-btn">新規登録</button>
                    </div>

                    <hr>

                    <button type="button" onclick="location.href='/linelogin'" class="line-login-btn">
                        <i class="fab fa-line"></i>LINEで新規登録
                    </button>

                    <div class="etc-login">
                        <button type="button" onclick="location.href='#'" class="etc-register-btn">その他で新規登録</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
