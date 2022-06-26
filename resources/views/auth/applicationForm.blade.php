@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/auth/teacher-application-form.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="teacher-app-container">

        <div class=" image-container">
        <img src="/img/logo_white@2x.png" alt="メディスタロゴ" width="300">
    </div>


    <div id="app-form" class="app-form-content">

        <h3>講師申請</h3>
        <p class="notes">
            <span class="asterisk">*</span>印の項目は必須項目です。必ずご記入願います。<br><span class="asterisk">*</span>英数字は全て半角でご記入ください。
        </p>

        <form method="POST" action="{{ url('/application') }}">
            @csrf
            <div class="input-form">
                <table class="input-form-table">
                    <tr>
                        <th>名前<span class="asterisk">*</span></th>

                        <td>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <th>ユーザー名<span class="asterisk">*</span></th>

                        <td>
                            <input id="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ Auth::user()->user_id }}" required>

                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <th>メールアドレス<span class="asterisk">*</span></th>

                        <td>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                    </tr>

                    <!-- <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">パスワード<span class="asterisk">*</span></label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->

                    <!-- <div class="form-group row mb-5 mb-md-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード<span class="asterisk">*</span><br>（確認のため再度入力してください）</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div> -->

                    <tr>
                        <th>大学名<span class="asterisk">*</span></th>

                        <td>
                            <input id="college_name" type="text" class="form-control @error('college_name') is-invalid @enderror" name="college_name" value="{{ old('college_name') }}" required autocomplete="college_name" autofocus>

                            @error('college_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <th>学部<span class="asterisk">*</span></th>

                        <td>
                            <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department" autofocus>

                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <th>学科・専攻<span class="asterisk">*</span></th>

                        <td>
                            <input id="major" type="text" class="form-control @error('major') is-invalid @enderror" name="major" value="{{ old('major') }}" required autocomplete="major" autofocus>

                            @error('major')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                    </tr>

                    <tr>
                        <th>学年<span class="asterisk">*</span></th>

                        <td>
                            <input id="grade" type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" value="{{ old('grade') }}" required autocomplete="grade" autofocus>

                            @error('grade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </td>
                    </tr>

                </table>

        </form>
        <div class="btn-container">
            <button type="submit" class="register-btn">申請する</button>
        </div>

    </div>
</div>
@endsection
