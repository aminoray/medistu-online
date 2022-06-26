@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/getting-ready.css') }}" >
@endsection

@section('content')


<div class="getting-ready">
    <div class="getting-ready-cone">
        <img src="/img/コーン.png" alt="">
    </div>
    <div class="getting-ready-coment">
        <h2>只今準備中です。</h2>
    </div>
    <div class="backtotop">
        <a href="/">TOPページに戻る</a>
    </div>



</div>


@endsection
