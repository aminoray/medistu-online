@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/auth/register-form.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="egister-container">
      <div class="image-container">
          <img src="/img/logo_white@2x.png" alt="メディスタロゴ" width="300">
      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
