@extends('layouts.app')

@section('stylesheet')
<link href="{{ asset('css/auth/application-form.css') }}" rel="stylesheet">
<link href="{{ asset('css/stripe.css') }}" rel="stylesheet">

<script src="{{ asset('js/stripe.js') }}" defer></script>
<script src="https://js.stripe.com/v3/"></script>

@endsection



@section('content')
<div class="container">
    <div class="app-form-container">
            <div class="image-container">
                <img src="/img/logo_white@2x.png" alt="メディスタロゴ" width= "300">
            </div>


        <div id="app-form" class="app-form-content">

            <h3>お支払い</h3>
            <p class="notes">
                <h2>{{ $plan ?? '' }}</h2>
                <span class="asterisk">*</span>印の項目は必須項目です。必ずご記入願います。<br><span class="asterisk">*</span>英数字は全て半角でご記入ください。
            </p>

          <h1>success</h1>

        </div>
    </div>
</div>

@endsection
