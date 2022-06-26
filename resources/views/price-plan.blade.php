@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/price-plan.css') }}" media="screen and (min-width:1024px)">
<link rel="stylesheet" href="{{ asset('css/price-plan_for_mobile.css') }}" media="screen and (max-width:1023px)">
<!-- <link rel="stylesheet" href="{{ asset('css/how-to-use_for_mobile.css') }}" media="screen and (max-width:480px)"> -->
@endsection

@section('content')

<main>
 <div class="pp-top">
     <h2>有料プランのご案内</h2>
     <h3>日頃よりメディスタオンラインをご利用頂き誠にありがとうございます。</h3>
 </div>
 <div class="pp-main">
     <img src="/img/price-plan.jpg" alt="">
 </div>

</main>


@endsection

