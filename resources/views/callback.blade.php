@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="register-container" style="padding-top: 88px; padding-bottom: 200px;">

    <div  class="text-center pb-4">
        <img src="/img/logo_white@2x.png" alt="メディスタロゴ" width= "300">
    </div>

    <h1 color="white">本登録</h1>

    <!-- <div class="links">
        <p>ユーザーID: {{$profile->userId}}</p>
        <p>名前: {{$profile->displayName}}</p>
        <p></p>


    </div> -->



        <div class="row justify-content-center">
            <div>
                <div class="register-card card shadow">

                    <div class="card-body">
                        <h3 class="text-center text-primary mb-4 mt-2">新規登録</h3>
                        <p style="font-size:11px; margin-left: 40px;"><span class="text-danger">*</span>印の項目は必須項目です。必ずご記入願います。<br>※英数字は全て半角でご記入ください。</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input id="user_id" type="hidden" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{$profile->userId}}" required >

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">名前<span class="text-danger">*</span></label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$profile->displayName}}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">ユーザー名<span class="text-danger">*</span></label>

                                <div class="col-md-7">


                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス<span class="text-danger">*</span></label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? ''}}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">パスワード<span class="text-danger">*</span></label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-5 mb-md-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード<span class="text-danger">*</span><br>（確認のため再度入力してください）</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row text-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success w-50">登録</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
