@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/auth/application-form.css') }}" rel="stylesheet">

@endsection



@section('content')
<div class="container">
    <div class="app-form-container">
            <div class="image-container">
                <img src="/img/logo_white@2x.png" alt="メディスタロゴ" width= "300">
            </div>


        <div id="app-form" class="app-form-content">

            <h3>有料会員登録</h3>
            <p class="notes">
                <span class="asterisk">*</span>印の項目は必須項目です。必ずご記入願います。<br><span class="asterisk">*</span>英数字は全て半角でご記入ください。
            </p>

            <form method="POST" action="{{ url('/premium_student_application') }}">
                @csrf
                <div class="input-form">
                    <table class="input-form-table">

                        <tr class="name-content input-container">
                            <th>
                                お名前<span class="asterisk">*</span>
                            </th>
                            <td>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </td>
                        </tr>

                        <tr class="furi-content input-container">
                            <th>
                                フリガナ<span class="asterisk">*</span>
                            </th>
                            <td>
                                <input id="furi" type="text" class="form-control" name="furi" value="{{ old('furi') }}">
                            </td>
                        </tr>

                        <!-- <tr class="username-content input-container">
                            <th>
                                ユーザー名<span class="asterisk">*</span>
                            </th>
                            <td>
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}">
                            </td>
                        </tr> -->

                        <tr class="email-content input-container">
                            <th>
                                メールアドレス<span class="asterisk">*</span>
                            </th>
                            <td>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </td>
                        </tr>

                        <tr class="phone_number-content input-container">
                            <th>
                                電話番号<span class="asterisk">*</span>
                            </th>
                            <td>
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="plan-content">
                    <p>ご希望プラン</p>
                    <div class="plan-select">
                        @if (Auth::user()->studentDetail->grade_id == 1)
                        <div class="plan-name">
                            <input id="plan" type="radio" name="plan" value="高校生" checked="checked">高校生<br>プラン
                        </div>
                        @else
                        <div class="plan-name">
                            <input id="plan" type="radio" name="plan" value="高校生">高校生<br>プラン
                        </div>
                        @endif
                        @if (Auth::user()->studentDetail->grade_id == 2)
                        <div class="plan-name">
                            <input id="plan" type="radio" name="plan" value="中学生" checked="checked">中学生<br>プラン
                        </div>
                        @else
                        <div class="plan-name">
                            <input id="plan" type="radio" name="plan" value="中学生">中学生<br>プラン
                        </div>
                        @endif
                        @if (Auth::user()->studentDetail->grade_id == 3)
                        <div class="plan-name">
                            <input id="plan" type="radio" name="plan" value="小学生" checked="checked">小学生<br>プラン
                        </div>
                        @else
                        <div class="plan-name">
                            <input id="plan" type="radio" name="plan" value="小学生">小学生<br>プラン
                        </div>
                        @endif
                        @error('plan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- <p class="attention">
                    ※注意：こちらのフォームを送信された時点で料金が発生することはございません。
                </p> -->


                <div class="btn-container">
                    <button type="submit" class="register-btn">支払いへ</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
